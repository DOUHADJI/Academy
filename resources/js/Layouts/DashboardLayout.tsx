import React, { useEffect, useState } from "react";
import { FunctionComponent, ReactNode } from "react";
import { Outlet } from "react-router-dom";
import axios from "axios";
import TopBar from "./topbar";
import MobileSidebar from "./mobileSidebar";
import Sidebar from "./sidebar";
import { UserContextProvider } from "@/Contexts/UserContext";
import { adminSidebarButtons } from "@/utils/sidebarButtons";
const DashboardLayout: FunctionComponent = () => {

    return (
        <>
            <UserContextProvider>

                <div className="flex top-[0] fixed right-0 left-0 bottom-0">
                    <MobileSidebar buttons={adminSidebarButtons} />
                    <Sidebar buttons={adminSidebarButtons} />
                    <div className="flex flex-col relative justify-center h-full overflow-y-hidden bg-gray-200  md:w-4/5">
                    <TopBar />
                        <div className="h-full overflow-y-auto z-30">
                            <div className="grid py-4 mb-16 px-12 w-full h-fit">
                                <Outlet />
                            </div>
                        </div>
                        <div className="text-center py-2 bg-white text-xs font-bold shadow-lg text-gray-400">
                            {" "}
                            @copyright 2024 - GLab- Tous les droits réservés
                        </div>
                    </div>
                </div>
            </UserContextProvider>
        </>
    );
};

export default DashboardLayout;
