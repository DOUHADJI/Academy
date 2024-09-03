import React from 'react';
import { BsArrowLeft } from 'react-icons/bs';
import { Link, useNavigate } from 'react-router-dom';

const PageNotFound = () => {
  const navigate = useNavigate();
  const goBack = () => navigate(-1);

  return (
    <div className="bg-light min-h-screen flex items-center">
      <div className="container mx-auto p-4">
        <div className="max-w-4xl mx-auto bg-white p-6">
          <div className="text-center">
            <h1 className="text-[65px] text-danger font-bold mb-8">404</h1>
            <h2 className="text-2xl text-danger font-bold mb-4">
              Nous sommes désolés !
            </h2>
            <p className="text-lg text-danger font-bold mb-4">
              La page que vous recherchez n'a pas été trouvée.
            </p>
            <div className="flex justify-center mt-4">
              <button
                className="bg-danger text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500"
                onClick={goBack}
              >
                Retour à la page précédente
              </button>
            </div>
            <div className=" flex justify-center w-full absolute bottom-4 right-0">
              <p className="text-dark font-medium text-center">
                Copyright © 2024 - GLab - All rights reserved.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default PageNotFound;
