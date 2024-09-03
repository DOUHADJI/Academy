import React from 'react';
import { RouterProvider } from 'react-router-dom';
import ReactDOM from 'react-dom/client';;
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import { NextUIProvider } from '@nextui-org/react';
import { router } from './Routing/Router';

const root = document.getElementById('root');

if (root) {
  ReactDOM.createRoot(root).render(
    <React.StrictMode>
      <NextUIProvider>
        <RouterProvider router={router} />
        <ToastContainer position='bottom-right' />
      </NextUIProvider>
    </React.StrictMode>,
  );
}
