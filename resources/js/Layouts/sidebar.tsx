import React, { FunctionComponent, useContext } from "react";
import { Link, useLocation, useNavigate } from "react-router-dom";
import SidebarButton from "./SidebarButton";
import { FaUserCheck, FaUserDoctor } from "react-icons/fa6";
import { FaCheck } from "react-icons/fa";
import { APP_NAME, LOGO_PATH } from "@/shared/constances";
import { ADMIN_HOME } from "@/Routing/Routes";
import { SidebarButtonType } from "@/utils/sidebarButtons";


const Sidebar : FunctionComponent<{buttons: SidebarButtonType[]}> = ({buttons}) => {
    const route = useLocation();

    const currentRoutePath = route.pathname;

    const navigate = useNavigate();

    const navigateToPage = (route) => {
        navigate(route);
    };
    return (
        <>
            <div className="flex flex-col h-full w-1/5">
                <div className="flex items-center justify-start px-2 gap-2 h-[60px]">
                    <Link
                        className=" flex items-center h-full pl-2"
                        to={ADMIN_HOME}
                    >
                        <img
                            src={LOGO_PATH}
                            alt="logo"
                            className="h-8"
                        />
                    </Link>
                    <div className="text-xs font-medium text-gray-600">
                         {APP_NAME}
                    </div>
                </div>
                <div
                    id="sidebar"
                    className="hidden md:flex bg-slate-900  py-8 shadow-md overflow-y-scroll "
                >
                    <div className="gap-0 py-6 w-full">
                        {buttons.map((button, index) => (
                            <SidebarButton
                                key={index}
                                name={button?.name}
                                routeTo={button?.route}
                                icon={button?.icon}
                            />
                        ))}
                    </div>
                </div>
            </div>
        </>
    );
};

export default Sidebar;
