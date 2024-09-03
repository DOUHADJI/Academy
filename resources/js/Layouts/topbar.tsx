import React, { useContext, useEffect, useState } from 'react';
import { TiThMenu } from 'react-icons/ti';
import { TbInputSearch } from 'react-icons/tb';
import { Link, useNavigate } from 'react-router-dom';
import { APP_NAME, LOGO_PATH } from '@/shared/constances';
import { ADMIN_HOME } from '@/Routing/Routes';
import UserProfileDropdown from '@/Components/UserProfileDropdown';



const TopBar = () => {


  const showSideBar = () => {
    const sidebar = document.getElementById('mobileSidebar');
    const showSidebarButton = document.getElementById('showSidebarButton');

    sidebar?.classList.remove('hidden');
    sidebar?.classList.add('animate-fadeInLeft');
    sidebar?.classList.add('shadow-md');
    // showSidebarButton.classList.add("hidden");
  };

  useEffect(() => {}, []);

  useEffect(() => {}, []);

  return (
    <>
      <div className="h-[70px] flex bg-gray-100">
        <div className="flex h-full items-center px-8 md:hidden">
          <button
            onClick={showSideBar}
            id="showSidebarButton"
            className=" p-2 dark:border-white"
          >
            <TiThMenu />
          </button>
        </div>
        <div className="flex gap-12 px-8 w-full justify-end items-center">
          <div>
            <UserProfileDropdown />
          </div>
        </div>
      </div>
    </>
  );
};

export default TopBar;
