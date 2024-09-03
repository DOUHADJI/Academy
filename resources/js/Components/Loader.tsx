import { Spinner } from '@nextui-org/react';
import React, { FunctionComponent } from 'react';

const Loader: FunctionComponent<{}> = ({}) => {
  return (
    <>
      <div className="min-h-screen flex items-center justify-center bg-gray-200">
        <div className="text-center">
          {/*  <img
                        src="/logo-gLab.svg"
                        alt="logo"
                        className="w-32 mx-auto mb-4"
                    /> */}
          <div className="flex items-center py-1 text-sm">
            <Spinner color="danger" size='sm' />
            <span className="font-medium text-danger ml-2 text-sm">
              Chargement en cours ...
            </span>
          </div>
        </div>
      </div>
    </>
  );
};
export default Loader;
