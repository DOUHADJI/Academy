import { CustomModal } from '@/Components/CustomModal';
import {
  CustomFormWrapper,
  CustomSelect,
  CustomTextInput,
} from '@/Components/CustomForm';
import React, {
  Dispatch,
  FunctionComponent,
  SetStateAction,
  useState,
} from 'react';
import * as Yup from 'yup';
import { REQUIRED_ERROR_MESSAGE } from '@/utils/validationMessages';
import axios from 'axios';
import { SuccessToast, WarningToast } from '@/Components/CustomToast';
import { Button } from '@nextui-org/react';
import { UPDATE_FACULTY } from '@/shared/apiEndPoints';
import { UserType } from '@/types/modelsTypes';
import { FaUserGraduate } from 'react-icons/fa6';

const UpdateFaculty: FunctionComponent<{
  open: boolean;
  setOpen: Dispatch<SetStateAction<boolean>>;
  setUpdateData: Dispatch<SetStateAction<boolean>>;
  item: any;
  teachers: UserType[];
}> = ({ open, setOpen, setUpdateData, item, teachers }) => {
  const [loading, setLoading] = useState<boolean>(false);

  const initialValues = {
    name: item?.name,
    tag: item?.tag,
    director : item?.director?.id
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
      const res = await axios.put(UPDATE_FACULTY(item?.id), dataToSend);

      if (res?.status === 200) {
        SuccessToast(res?.data?.message?.title, res?.data?.message?.content);
        setOpen(false);
        setUpdateData(true);
      }

      if (res?.status === 202) {
        WarningToast(res?.data?.message?.title, res?.data?.message?.content);
      }
    } catch (error) {
      console.error('Error updating module:', error);
      // Gestion des erreurs ici
    }

    setLoading(false);
  };

  return (
    <>
      <CustomModal
        title={`Modifier la faculté/école : ${item?.name}`}
        open={open}
        setOpen={setOpen}
        size={'lg'}
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
            defaultValue={item?.director?.id}
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

export default UpdateFaculty;
