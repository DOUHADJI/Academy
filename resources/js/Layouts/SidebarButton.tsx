import React, { ReactNode } from 'react';
import { FunctionComponent } from 'react';
import { IconType } from 'react-icons/lib';
import { Link, useLocation } from 'react-router-dom';

const SidebarButton: FunctionComponent<{
  name: string;
  routeTo: string;
  icon: IconType;
}> = ({ name, routeTo, icon: Icon }) => {
  const route = useLocation();
  const currentRoutePath = route.pathname;
  // currentRoutePath == button.route
  return (
    <>
      <div className="h-fit">
        <Link
          className={` flex items-center justify-between pl-4 pr-12 py-4 font-semibold text-xs hover:bg-gray-100 hover:text-black ${currentRoutePath == routeTo || route.pathname.startsWith(routeTo) ? 'text-gray-200 bg-success' : 'text-gray-500'}`}
          to={routeTo}
        >
          <div className="menu-title w-100 text-nowrap text-uppercase">
            {name}
          </div>
          <div className={`menu-icon  w-100 d-flex justify-content-center`}>
            <Icon size={17} />
          </div>
        </Link>
      </div>
    </>
  );
};
export default SidebarButton;
