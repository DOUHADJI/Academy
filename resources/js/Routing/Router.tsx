import DashboardLayout from "@/Layouts/DashboardLayout";
import Login from "@/Pages/Auth/Login";
import { createBrowserRouter } from "react-router-dom";
import { ADMIN_HOME, CLASSES_ROUTE, FACULTIES_ROUTE } from "./Routes";
import AdminHome from "@/Pages/AdminPanel/AdminHome";
import PageNotFound from "@/Pages/404";
import ClassesPage from "@/Pages/AdminPanel/Classes/ClassesPage";
import FacultiesPage from "@/Pages/AdminPanel/Faculties/FacultiesPage";
import React from "react";


export const router = createBrowserRouter([
    {
        path: "/",
        element: <Login />,
    },

    {
        path: "",
        element: <DashboardLayout />,
        children: [
            {
                path: ADMIN_HOME,
                element: <AdminHome />,
            },

            {
                path: CLASSES_ROUTE,
                element: <ClassesPage />,
            },
            {
                path: FACULTIES_ROUTE,
                element: <FacultiesPage />,
            },
        ],
    },

    {
        path : "*",
        element : <PageNotFound />
    }
]);
