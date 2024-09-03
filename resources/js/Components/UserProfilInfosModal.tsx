
import { ErrorToast, SuccessToast } from '@/Components/CustomToast';
import { userContext } from '@/Contexts/UserContext';
import { UPDATE_USER } from '@/shared/apiEndPoints';

import {
  EMAIL_ERROR_MESSAGE,
  REQUIRED_ERROR_MESSAGE,
} from '@/utils/validationMessages';
import { Button } from '@nextui-org/react';
import axios from 'axios';
import { Form, Formik } from 'formik';
import React, {
  Dispatch,
  FunctionComponent,
  SetStateAction,
  useContext,
  useState,
} from 'react';
import { useLocation, useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import * as Yup from 'yup';
import { CustomModal } from './CustomModal';
import CustomFormikTextInput from './CustomFormikTextInput';

const UserProfilInfosModal: FunctionComponent<{
  open: boolean;
  setOpen: Dispatch<SetStateAction<boolean>>;
}> = ({ open, setOpen }) => {
  const [loading, setLoading] = useState(false);
  const { user, setUser } = useContext(userContext);

  const navigate = useNavigate();

  const initialValues = {
    name: user ? user?.name : '',
    lastName: user?.last_name,
    firstName: user?.first_name,
    dateOfBirth: user?.date_of_birth,
    phoneNumber: user?.phone_number,
    email: user?.email,
  };

  const validationSchema = Yup.object().shape({
    name: Yup.string().required(REQUIRED_ERROR_MESSAGE),
    lastName: Yup.string().required(REQUIRED_ERROR_MESSAGE),
    firstName: Yup.string().required(REQUIRED_ERROR_MESSAGE),
    dateOfBirth: Yup.date().required(REQUIRED_ERROR_MESSAGE),
    phoneNumber: Yup.string().required(REQUIRED_ERROR_MESSAGE),
    email: Yup.string()
      .required(REQUIRED_ERROR_MESSAGE)
      .email(EMAIL_ERROR_MESSAGE),
  });

  const handleSubmit = async (values) => {
    setLoading(true);
    try {
      const dataToSend = {
        name: values?.name,
        first_name: values?.firstName,
        last_name: values?.lastName,
        phone_number: values?.phoneNumber,
        date_of_birth: values?.dateOfBirth,
        email: values?.email,
      };

      const res = await axios.put(UPDATE_USER(user?.id), dataToSend);

      if (res?.status === 200) {
        SuccessToast(res?.data?.message?.title, res?.data?.message?.content);
        window.location.reload();
      }

      if (res?.status === 202) {
        ErrorToast(res?.data?.message?.title, res?.data?.message?.content);
      }
    } catch (error) {
      console.log(error);
      toast.error("Une erreur s'est produite");
    }
    setLoading(false);
  };
  return (
    <>
      <CustomModal
        open={open}
        setOpen={setOpen}
        size={'4xl'}
        title="Informations de l'utilisateur "
      >
        <div className="text-lg bg-danger text-white  p-4 text-center">
          Profil d'utilisateur : <b> {user?.profil?.name} </b>
        </div>
        <Formik
          initialValues={initialValues}
          validationSchema={validationSchema}
          onSubmit={handleSubmit}
        >
          {({ errors, touched, values }) => (
            <Form>
              <div className="grid md:grid-cols-3 gap-6 py-8">
                <CustomFormikTextInput
                  name="lastName"
                  label="Nom"
                  errors={errors}
                  touched={touched}
                />

                <CustomFormikTextInput
                  name="firstName"
                  label="Prénom(s)"
                  errors={errors}
                  touched={touched}
                />

                <CustomFormikTextInput
                  name="name"
                  label="Nom d'utilisateur"
                  errors={errors}
                  touched={touched}
                />

                <CustomFormikTextInput
                  name="dateOfBirth"
                  label="Date de naissance"
                  type="date"
                  errors={errors}
                  touched={touched}
                />

                <CustomFormikTextInput
                  name="phoneNumber"
                  label="Contact"
                  errors={errors}
                  touched={touched}
                />

                <CustomFormikTextInput
                  name="email"
                  label="Addresse email"
                  errors={errors}
                  touched={touched}
                />
              </div>
              <div className="flex justify-end gap-6 py-4">
                <Button type="button" onPress={() => setOpen(false)}>
                  Annuler
                </Button>
                <Button type="submit" color="danger" isLoading={loading}>
                  {loading && 'Enregistrer les modifications'}
                  {!loading && 'Modifier mes informations'}
                </Button>
              </div>
            </Form>
          )}
        </Formik>
      </CustomModal>
    </>
  );
};

export default UserProfilInfosModal;
