import FacultyCard from '@/Components/FacultyCard';
import { TableColumn, TableRow, TableWrapper } from '@/Components/Tables/Table';
import Breadcrumb from '@/Layouts/Breadcrumb';
import { ADMIN_HOME, FACULTIES_ROUTE } from '@/Routing/Routes';
import {
  GET_FACULTIES,
  GET_FACULTY,
  GET_TEACHERS,
} from '@/shared/apiEndPoints';
import { FacultyType, UserType } from '@/types/modelsTypes';
import { Button } from '@nextui-org/react';
import axios from 'axios';
import React, { FunctionComponent, useEffect, useState } from 'react';
import { FaGraduationCap, FaPen, FaSchool, FaTrash } from 'react-icons/fa6';
import { Link } from 'react-router-dom';
import CreateFaculty from './CreateFaculty';
import CustomButton from '@/Components/CustomButton';
import { WarningToast } from '@/Components/CustomToast';
import DeleteFaculty from './DeleteFaculty';
import UpdateFaculty from './UpdateFaculty';

const FacultiesPage: FunctionComponent = () => {
  const [tableLoading, setTableLoading] = useState<boolean>(false);
  const [seachFormLoading, setSeachFormLoading] = useState<boolean>(false);
  const [faculties, setFaculties] = useState<FacultyType[]>([]);
  const [selectedFaculty, setSelectedFaculty] = useState<FacultyType>();
  const [openCreateModal, setOpenCreateModal] = useState(false);
  const [teachers, setTeachers] = useState<UserType[]>([]);
  const [openDeleteModal, setOpenDeleteModal] = useState<boolean>(false);
  const [openUpdateModal, setOpenUpdateModal] = useState<boolean>(false);
  const [updateData, setUpdateData] = useState<boolean>(true);

  const getFaculties = async () => {
    setTableLoading(true);
    const res = await axios.get(GET_FACULTIES);
    if (res?.status == 200) {
      setFaculties(res?.data?.faculties);
      setTableLoading(false);
    }
  };

  const getTeachers = async () => {
    try {
      const res = await axios.get(GET_TEACHERS);

      if (res?.status == 200) {
        setTeachers(res?.data?.teachers);
      }
    } catch (error) {
      console.log(error);
    }
  };

  const initialValues = {
    inputValue: '',
  };

  const handleSubmit = async (values) => {
    setSeachFormLoading(true);
    setTableLoading(true);
    const name = values?.inputValue;

    const res = await axios.get(GET_FACULTY(name));
    console.log(name);
    console.log(res);

    if (res?.status === 200) {
      setFaculties(res?.data?.faculties);
    }
    if (res?.status === 202) {
      WarningToast(res?.data?.message?.title, res?.data?.message?.content);
    }
    setSeachFormLoading(false);
    setTableLoading(false);
  };

  const handleOnBlur = (values) => {
    if (values?.inputValue !== '') {
      getFaculties();
    }
  };

  const handleUpdate = (fac) => {
    setSelectedFaculty(fac);
    setOpenUpdateModal(true);
  };

  const handleDelete = (fac) => {
    setSelectedFaculty(fac);
    setOpenDeleteModal(true);
  };

  useEffect(() => {
    if (updateData === true) {
      getFaculties();
      setUpdateData(false);
    }
  }, [updateData]);

  useEffect(() => {
    getTeachers();
  }, []);

  return (
    <>
      <Breadcrumb
        pageTitle="Facultés et Ecole"
        previousLabel="Administration"
        previousLink={ADMIN_HOME}
      />

      <div className="flex">
        <CustomButton
          color="danger"
          onPress={() => setOpenCreateModal(true)}
          isTextUppercase
        >
          <FaGraduationCap size={20} /> Créer une faculté
        </CustomButton>
      </div>
      <div className="mt-8 bg-white pb-12">
        <div className="px-8">
          <TableWrapper
            header={['Nom du département', 'Actions']}
            title="Listes des facultés et écoles"
            items={faculties}
            initialValues={initialValues}
            searchFormLoading={seachFormLoading}
            searchInputPlaceholder="Rechercher une faculté"
            handleSubmitForm={handleSubmit}
            handleOnBlur={handleOnBlur}
            loading={tableLoading}
            loadingLabel="Recherche en cours..."
          >
            {faculties?.map((fac, index) => (
              <TableRow key={index}>
                <TableColumn>
                  {' '}
                  <b>{fac?.name} </b>
                </TableColumn>
                <TableColumn width={'15%'}>
                  <div className="flex justify-center gap-3 p-4">
                    <Button
                      isIconOnly
                      color="default"
                      size="sm"
                      onPress={() => handleUpdate(fac)}
                    >
                      <FaPen />
                    </Button>
                    <Button
                      isIconOnly
                      size="sm"
                      className="bg-red-700 text-white"
                      onPress={() => handleDelete(fac)}
                    >
                      <FaTrash />
                    </Button>
                  </div>
                </TableColumn>
              </TableRow>
            ))}
          </TableWrapper>
        </div>
      </div>
      <CreateFaculty
        open={openCreateModal}
        setOpen={setOpenCreateModal}
        teachers={teachers}
        setUpdateData={setUpdateData}
      />

      <UpdateFaculty
        open={openUpdateModal}
        setOpen={setOpenUpdateModal}
        item={selectedFaculty}
        setUpdateData={setUpdateData}
        teachers={teachers}
      />

      <DeleteFaculty
        open={openDeleteModal}
        setOpen={setOpenDeleteModal}
        item={selectedFaculty}
        setUpdateData={setUpdateData}
      />
    </>
  );
};

export default FacultiesPage;
