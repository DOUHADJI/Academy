import React, { FunctionComponent } from 'react';
import { Formik, Form, Field } from 'formik';
import * as Yup from 'yup';
import { CustomSubmitButton } from './CustomForm';
import { Button } from '@nextui-org/react';
import { FaSearch, FaTimes } from 'react-icons/fa';

interface CustomSearchFormProps {
  initialValues: {
    inputValue: string;
  };
  handleSubmit: (values: { inputValue: string }) => void;
  validationSchema?: Yup.ObjectSchema<any>;
  placeholder: string;
  handleOnBlur: (values: { inputValue: string }) => void;
  loading: boolean;
}

const CustomSearchForm: FunctionComponent<CustomSearchFormProps> = ({
  initialValues,
  handleSubmit,
  validationSchema,
  placeholder,
  handleOnBlur,
  loading,
}) => {
  return (
    <Formik
      initialValues={initialValues}
      onSubmit={handleSubmit}
      validationSchema={validationSchema}
      validateOnChange={false}
      validateOnBlur={false}
      onReset={handleOnBlur}
    >
      {({ errors, touched, resetForm }) => (
        <Form>
          <div className="flex items-start justify-end gap-4 px-8 py-6 mb-8 bg-gray-100">
            <div className="grid relative w-1/2">
            <div className="flex w-full">
                <div
                  className={`flex bg-blue-100 py-2 px-4 items-center justify-center border-y border-l border-gray-400 text-sm  ${
                    errors?.inputValue && touched?.inputValue
                      ? 'border-red-500'
                      : 'border-gray-400'
                  }  ${!errors?.inputValue && touched?.inputValue ? 'border-green-500' : null}
                        `}
                >
                  <FaSearch />
                </div>
                <Field
                  type="text"
                  className={` w-full border border-gray-400 text-sm  ${
                    errors?.inputValue && touched?.inputValue
                      ? 'border-red-500'
                      : 'border-gray-400'
                  }  ${!errors?.inputValue && touched?.inputValue ? 'border-green-500' : null} `}
                  placeholder={placeholder.toString()}
                  name={"inputValue"}
                />
              </div>
              <div className="absolute top-1 right-4">
                <Button
                  className="border-0 "
                  onPress={() => resetForm()}
                  type="button"
                  isIconOnly
                  color="default"
                  variant="bordered"
                  size="sm"
                >
                  <FaTimes />
                </Button>
              </div>
              {errors.inputValue && touched.inputValue && (
                <div className="text-sm text-red-500">{errors.inputValue}</div>
              )}
            </div>
            <div className="form-group col-3">
              <Button
                isLoading={loading}
                className="text-white bg-red-700 rounded-none"
                type="submit"
                onPress={() => handleSubmit}
              >
                Rechercher
              </Button>
            </div>
          </div>
        </Form>
      )}
    </Formik>
  );
};

export default CustomSearchForm;
