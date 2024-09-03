import { ADMIN_HOME, CLASSES_ROUTE, COURSES_ROUTE, DEPARTMENTS_ROUTE, ENROLLMENTS_ROUTE, EXAMS_ROUTE, FACULTIES_ROUTE, RESULTS_ROUTE, STUDENTS_ROUTE, STUDY_DOMAINS_ROUTE, TEACHERS_ROUTE } from '@/Routing/Routes';
import { IconType } from 'react-icons';
import { FaArchive, FaFileAlt } from 'react-icons/fa';
import { FaGraduationCap, FaHouse, FaLayerGroup, FaList, FaListCheck, FaMarkdown, FaSchool, FaUserGraduate, FaUserGroup } from 'react-icons/fa6';

export type SidebarButtonType = {
  name: string;
  route: string;
  icon: IconType;
};


export const adminSidebarButtons: SidebarButtonType[] = [
    {
      name: 'Accueil',
      route: ADMIN_HOME,
      icon: FaHouse,
    },

    {
        name: "Facultés et Ecoles",
        route: FACULTIES_ROUTE,
        icon: FaSchool,
    },

    {
        name: "Départements",
        route: DEPARTMENTS_ROUTE,
        icon: FaLayerGroup,
    },

    {
        name: "Domaines d'études",
        route: STUDY_DOMAINS_ROUTE,
        icon: FaLayerGroup,
      },

      {
        name: 'Parcours',
        route: CLASSES_ROUTE,
        icon: FaArchive,
    },


    {
        name: "Unités d'enseignements",
        route: COURSES_ROUTE,
        icon: FaGraduationCap,
    },


    {
        name: "Inscriptions",
        route: ENROLLMENTS_ROUTE,
        icon: FaListCheck,
    },

    {
        name: 'Enseignants',
        route: TEACHERS_ROUTE,
        icon: FaUserGroup,
    },

    {
        name: 'Etudiants',
        route: STUDENTS_ROUTE,
        icon: FaUserGraduate,
    },



    {
        name: "Examinations",
        route: EXAMS_ROUTE,
        icon: FaFileAlt,
    },

    {
        name: "Résultats",
        route: RESULTS_ROUTE,
        icon: FaList,
    },
]


export const studentSidebarButtons : SidebarButtonType[] = [

]
