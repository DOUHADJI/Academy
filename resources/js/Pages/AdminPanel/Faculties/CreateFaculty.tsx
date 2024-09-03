import { CustomModal } from "@/Components/CustomModal";
import React, {
    FunctionComponent,
    useState,
    Dispatch,
    SetStateAction,
    useEffect,
} from "react";
import * as Yup from "yup";
import { REQUIRED_ERROR_MESSAGE } from "@/utils/validationMessages";

import axios from "axios";
import { toast } from "react-toastify";
import { SuccessToast, WarningToast } from "@/Components/CustomToast";
import { Button } from "@nextui-org/react";
import { CREATE_FACULTY, GET_TEACHERS } from "@/shared/apiEndPoints";
import {
    CustomFormWrapper,
    CustomSelect,
    CustomTextInput,
} from "@/Components/CustomForm";
import { UserType } from "@/types/modelsTypes";
import { FaUserGraduate } from "react-icons/fa6";
import CustomButton from "@/Components/CustomButton";

const CreateFaculty: FunctionComponent<{
    open: boolean;
    setOpen: Dispatch<SetStateAction<boolean>>;
    teachers: UserType[];
     setUpdateData: Dispatch<SetStateAction<boolean>>;
}> = ({ open, setOpen, teachers , setUpdateData}) => {
    const [loading, setLoading] = useState<boolean>(false);

    const initialValues = {
        name : "",
        tag : "",
        director : "",
    };

    const validationSchema = Yup.object().shape({
        name: Yup.string().required(REQUIRED_ERROR_MESSAGE),
        tag : Yup.string().required(REQUIRED_ERROR_MESSAGE),
        director: Yup.string().required(REQUIRED_ERROR_MESSAGE),
    });

    const handleSubmit = async (values) => {
        setLoading(true);
        const dataToSend = {
            name: values.name,
            director_id: values?.director,
            tag : values?.tag
        };

        try {
            const res = await axios.post(CREATE_FACULTY, dataToSend);
            console.log(res)

            if (res?.status === 201) {
                SuccessToast(
                    res?.data?.message?.title,
                    res?.data?.message?.content,
                );
                setOpen(false);
                setUpdateData(true);
            }

            if (res?.status === 202) {
                WarningToast(
                    res?.data?.message?.title,
                    res?.data?.message?.content,
                );
            }
        } catch (error) {
            console.log(error);
            toast.error(
                "Une erreur est survenue lors de la création du module.",
            );
        }

        setLoading(false);
    };

    return (
        <>
            <CustomModal
                title="Ajouter une nouvelle faculté/Ecole"
                open={open}
                setOpen={setOpen}
                size={"lg"}
            >
                <CustomFormWrapper
                    initialValues={initialValues}
                    handleSubmit={handleSubmit}
                    validationSchema={validationSchema}
                    gridClass="grid"
                >
                    <CustomTextInput
                        name="name"
                        label="Nom de la faculté/de l'école"
                        required
                        placeholder="Entrez le libellé du module"
                    />

                    <CustomTextInput
                        name="tag"
                        label="Tag de la faculté/de l'école"
                        required
                        placeholder="Entrez le libellé du module"
                    />

                    <CustomSelect
                        name="director"
                        options={teachers}
                        optionLabelField="name"
                        optionValueField="id"
                        label="Directeur de la faculté/de l'école"
                        required
                        placeholder="Choisir le directeur"
                        icon={FaUserGraduate}
                    />

                    <div className="flex justify-end py-4">
                        <Button
                            isLoading={loading}
                            className="text-white bg-red-700 rounded-none"
                            type="submit"
                        >
                             Enregistrer
                        </Button>
                    </div>
                </CustomFormWrapper>
            </CustomModal>
        </>
    );
};

export default CreateFaculty;
