import React, { FunctionComponent, useEffect } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import axios from 'axios';
import { BsHouseDoor, BsGrid3X3Gap } from 'react-icons/bs';
import { FaCaretRight, FaHouse } from 'react-icons/fa6';
import { DASHBOARD_HOME_ROUTE } from '@/Routing/Routes';
import { APP_NAME } from '@/shared/constances';

const Breadcrumb: FunctionComponent<{
  pageTitle: string;
  previousLabel: string;
  previousLink: string;
  currentLink?: string;
}> = ({ pageTitle, previousLabel, previousLink, currentLink = null }) => {
  useEffect(() => {
    document.title = `${APP_NAME} - ${pageTitle}`;
  }, [pageTitle]);

  return (
    <>
      <div className="font-semibold text-xs">{pageTitle}</div>
      <ol className="flex items-center whitespace-nowrap p-2 mb-8">
        <li className="inline-flex items-center">
          <Link
            to={DASHBOARD_HOME_ROUTE}
            className="flex items-center text-xs text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
          >
            <FaHouse className="flex-shrink-0 me-2 h-3 w-auto" />
            {APP_NAME}
          </Link>
          <FaCaretRight className="flex-shrink-0 mx-2 h-3 w-auto text-gray-400" />
        </li>
        <li className="inline-flex items-center">
          <Link
            to={previousLink}
            className="flex items-center text-xs text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
          >
            <BsGrid3X3Gap className="flex-shrink-0 me-2 h-3 w-auto" />
            {previousLabel}
          </Link>
          <FaCaretRight className="flex-shrink-0 mx-2 h-3 w-auto text-gray-400" />
        </li>
        <li
          className="inline-flex items-center text-xs font-medium text-gray-800 truncate"
          aria-current="page"
        >
          {pageTitle}
        </li>
      </ol>
    </>
  );
};

export default Breadcrumb;
