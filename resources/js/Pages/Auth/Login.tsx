import CustomFormikTextInput from "@/Components/CustomFormikTextInput";
import { ErrorToast, SuccessToast } from "@/Components/CustomToast";
import { ADMIN_HOME } from "@/Routing/Routes";
import { APP_NAME } from "@/shared/constances";
import { REQUIRED_ERROR_MESSAGE } from "@/utils/validationMessages";
import { Button } from "@nextui-org/react";
import axios from "axios";
import { Form, Formik } from "formik";
import React, { useEffect, useState } from "react";
import { FaUser } from "react-icons/fa";
import { FaLock, FaMessage, FaPerson } from "react-icons/fa6";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import * as Yup from "yup";

const Login = () => {
    const [credentialsError, setCredentialsError] = useState("");
    const [errors, setErrors] = useState<string[][]>([]);
    const [handlingRequest, setHandlingRequest] = useState(false);

    const initialValues = {
        name: "Administrateur",
        password: "AcademyLoginPass1234",
    };

    const validationSchema = Yup.object().shape({
        name: Yup.string().required(REQUIRED_ERROR_MESSAGE),
        password: Yup.string().required(REQUIRED_ERROR_MESSAGE),
    });

    const navigate = useNavigate();

    const handleSubmit = async (values) => {
        setHandlingRequest(true);

        try {
            const dataToSend = {
                name: values?.name,
                password: values?.password,
            };
            await axios.get("/sanctum/csrf-cookie");
            const res = await axios.post("/login", dataToSend);

            if (res?.data.errors) {
                setErrors(res?.data.errors);
                setHandlingRequest(false);
            }

            if (res?.status == 202) {
                setHandlingRequest(false);
                setCredentialsError(res?.data.message);
                ErrorToast("Connexion", res?.data?.message);

            }

            if (res?.status == 200) {
                setHandlingRequest(false);
                navigate(res?.data?.userPanelRoute);
                setTimeout(
                    () =>
                        SuccessToast(
                            "Connexion",
                            "vous avez été connecté avec succès",
                        ),
                    1000,
                );
            }
        } catch (error) {
            console.log(error)
        }

        setHandlingRequest(false);
    };

    useEffect(() => {
        document.title = APP_NAME + " - Connexion";
    }, []);
    return (
        <>
            <div className="min-h-screen flex items-center justify-center bg-gray-200">
                <div className="w-full max-w-md">
                    <div className="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div className="mb-4">
                            <img
                                src="/GU-logo.png"
                                className="mx-auto h-24 w-auto"
                            />
                        </div>
                        <div className="text-center mb-6">
                            <strong> {APP_NAME} </strong> - Portail académique
                            de votre université en ligne
                        </div>
                        <div className="text-center text-red-500 font-bold mb-2 text-xs">
                            {credentialsError ? credentialsError : null}
                        </div>
                        <div className="w-full">
                            <Formik
                                initialValues={initialValues}
                                validationSchema={validationSchema}
                                onSubmit={handleSubmit}
                            >
                                {({ errors, touched }) => (
                                    <Form>
                                        <div>
                                            <CustomFormikTextInput
                                                name="name"
                                                label="Identifiant"
                                                placeholder="Entrez votre identifiant"
                                                errors={errors}
                                                touched={touched}
                                                required
                                                icon={FaUser}
                                            />

                                            <CustomFormikTextInput
                                                name="password"
                                                type="password"
                                                label="Mot de passe"
                                                placeholder="Entrez votre mot de passe"
                                                errors={errors}
                                                touched={touched}
                                                required
                                                icon={FaLock}
                                            />

                                            <Button
                                                className="w-full bg-danger text-white rounded-md mt-6"
                                                type="submit"
                                                isDisabled={handlingRequest}
                                                isLoading={handlingRequest}
                                            >
                                                SE CONNECTER
                                            </Button>
                                        </div>
                                    </Form>
                                )}
                            </Formik>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Login;
