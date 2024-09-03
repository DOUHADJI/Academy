import Breadcrumb from "@/Layouts/Breadcrumb";
import { ADMIN_HOME } from "@/Routing/Routes";
import React from "react";

const ClassesPage = () => {
    return (
        <>
            <Breadcrumb
                pageTitle="Classes"
                previousLabel="Administration"
                previousLink={ADMIN_HOME}
            />
        </>
    );
};

export default ClassesPage;
