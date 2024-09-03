import React, { Dispatch, ReactNode, SetStateAction } from 'react';
import { Spinner } from '@nextui-org/react';
import CustomSearchForm from '../CustomSearchForm';
import * as Yup from 'yup';
import { REQUIRED_ERROR_MESSAGE } from '@/utils/validationMessages';

interface TableColumnProps {
  children?: ((props: { item: any }) => ReactNode) | ReactNode;
}

const TableWrapper: React.FC<{
  title: string;
  header: string[];
  children: React.ReactNode;
  loading: boolean;
  loadingLabel: string;
  items: any[];
  initialValues?: any;
  searchInputPlaceholder: string;
  handleSubmitForm: Function;
  handleOnBlur: Function;
  searchFormLoading: boolean;
}> = ({
  title,
  header,
  children,
  loading,
  loadingLabel,
  items,
  initialValues,
  searchInputPlaceholder,
  handleSubmitForm,
  handleOnBlur,
  searchFormLoading,
}) => {
  const validationSchema = Yup.object().shape({
    inputValue: Yup.string().required(REQUIRED_ERROR_MESSAGE),
  });

  return (
    <div className="bg-white">
       <div className="font-black px-6 py-8 uppercase text-md">
          Listes des facultés et écoles
        </div>
      <CustomSearchForm
        loading={searchFormLoading}
        initialValues={initialValues}
        validationSchema={validationSchema}
        placeholder={searchInputPlaceholder}
        handleSubmit={(values) => handleSubmitForm(values)}
        handleOnBlur={() => handleOnBlur()}
      />
      <table className="min-w-full bg-white border border-gray-400">
        <thead className="bg-blue-300">
          <tr className="py-2">
            {header?.map((head, index) => (
              <th
                className="py-4 px-2  text-[12px] border border-gray-400 text-black uppercase"
                key={index}
              >
                {' '}
                {head}{' '}
              </th>
            ))}
          </tr>
        </thead>
        <tbody>
          {!loading && items?.length === 0 && (
            <tr>
              <td
                colSpan={header?.length}
                className="px-6 py-4 border-b border-gray-400 text-center text-sm text-gray-500"
              >
                Aucune donnée
              </td>
            </tr>
          )}

          {!loading && items?.length > 0 && children}

          {loading && (
            <tr>
              <td
                colSpan={header?.length}
                className="px-6 py-6 border-b border-gray-400 text-center text-sm text-gray-500"
              >
                <div className="flex justify-center space-x-2">
                  <Spinner color="default" size='sm' />
                  <span className="font-bold text-sm">{loadingLabel}</span>
                </div>
              </td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
};

const TableRow: React.FC<{ children: ReactNode }> = ({ children }) => {
  return (
    <>
      <tr>{children}</tr>
    </>
  );
};

const TableColumn: React.FC<{
  children?: ReactNode;
  width?: string | number | any;
  centered?: boolean;
}> = ({ children, width = 'auto', centered = true }) => {
  return (
    <>
      <td
        width={width}
        className={`border border-gray-400 text-xs text-black py-3 ${
          centered ? 'text-center' : null
        }`}
      >
        {children}
      </td>
    </>
  );
};
export { TableWrapper, TableRow, TableColumn };
