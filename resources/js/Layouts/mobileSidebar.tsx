
import React, { FunctionComponent } from 'react';
import { useLocation, useNavigate } from 'react-router-dom';
import { BsX } from 'react-icons/bs';
import SidebarButton from './SidebarButton';
import { SidebarButtonType } from '@/utils/sidebarButtons';


const MobileSidebar : FunctionComponent<{buttons : SidebarButtonType[]}> = ({buttons}) => {
  const route = useLocation();

  const currentRoutePath = route.pathname;

  const navigate = useNavigate();

  const navigateToPage = (route) => {
    navigate(route);
  };

  const hideSideBar = () => {
    const sidebar = document.getElementById('mobileSidebar');
    const showSideBarButton = document.getElementById('showSideBarButton');
    console.log(showSideBarButton);

    sidebar?.classList.add('hidden');
    sidebar?.classList.remove('animate-fadeInLeft');
    sidebar?.classList.remove('animate-fadeOutLeft');
    sidebar?.classList.remove('shadow-md');
    showSideBarButton?.classList.remove('hidden');
  };

  return (
    <div
      id="mobileSidebar"
      className=" hidden  flex bg-gray-300 h-full fixed top-[70px] bottom-0 left-0 w-1/2 shadow-md py-4 z-40 md:hidden"
    >
      <div className="flex flex-col py-12 w-full">
        <div className="flex -mt-8 pb-6 items-center justify-end px-8 md:hidden">
          <button
            id="hideSideBarButton"
            className="p-2 border border-gray-700"
            onClick={hideSideBar}
          >
            <BsX />
          </button>
        </div>
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
  );
};

export default MobileSidebar;
