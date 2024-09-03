import { Avatar } from "@nextui-org/react";
import {
    Field,
    Form,
    Formik,
    FormikErrors,
    FormikTouched,
    useField,
    useFormikContext,
} from "formik";
import React, {
    Dispatch,
    FunctionComponent,
    ReactNode,
    SetStateAction,
    useEffect,
    useRef,
    useState,
} from "react";
import { IconType } from "react-icons";
import { BsDot } from "react-icons/bs";
import { FaTimes } from "react-icons/fa";
import { FormGroup, Input, Label } from "reactstrap";
import * as Yup from "yup";

interface CustomFormWrapperProps {
    initialValues: {};
    gridClass?: string;
    handleSubmit: (values: any) => void;
    validationSchema: Yup.ObjectSchema<any>;
    children: ReactNode;
}

interface ChildProps {
    errors: FormikErrors<any>;
    touched: FormikTouched<any>;
}

const CustomFormWrapper: FunctionComponent<CustomFormWrapperProps> = ({
    initialValues,
    gridClass = "grid md:grid-cols-2 gap-4",
    handleSubmit,
    validationSchema,
    children,
}) => {
    return (
        <Formik
            initialValues={initialValues}
            validationSchema={validationSchema}
            onSubmit={(values) => handleSubmit(values)}
            validateOnBlur={false}
        >
            {({ errors, touched, isValid }) => (
                <Form className={gridClass}>
                    {React.Children.map(children, (child) => {
                        if (React.isValidElement<ChildProps>(child)) {
                            return React.cloneElement(child, {
                                errors,
                                touched,
                            });
                        }
                        return child;
                    })}
                </Form>
            )}
        </Formik>
    );
};

interface CustomTextInputProps<T> {
    name: string;
    label?: string;
    placeholder?: string;
    errors?: FormikErrors<T>;
    touched?: FormikTouched<T>;
    type?: string;
    min?: number;
    required?: boolean;
    isDisabled?: boolean;
    uppercase?: boolean;
    icon?: IconType;
}

const CustomTextInput = <T,>({
    name,
    label,
    placeholder,
    errors,
    touched,
    type,
    min,
    required = false,
    isDisabled = false,
    uppercase = false,
    icon: Icon,
}: CustomTextInputProps<T>) => {
    const error = errors[name as keyof T];
    const isTouched = touched[name as keyof T];

    return (
        <div className="flex flex-col w-full py-2">
            <div className="p-1 text-md font-semibold truncate">
                {label}{" "}
                <span className="text-danger"> {required ? "*" : null} </span>
            </div>
            <div className="flex w-full">
                <div
                    className={`flex bg-blue-100 py-2 px-4 items-center justify-center border-y border-l border-gray-400 text-sm  ${
                        error && isTouched
                            ? "border-red-500"
                            : "border-gray-400"
                    }  ${!error && isTouched ? "border-green-500" : null}
                        `}
                >
                    {Icon && <Icon />}
                    {!Icon && <BsDot />}
                </div>
                <Field
                    disabled={isDisabled}
                    type={type ? type : "text"}
                    min={min}
                    className={` w-full border border-gray-400 text-sm  ${
                        error && isTouched
                            ? "border-red-500"
                            : "border-gray-400"
                    }  ${!error && isTouched ? "border-green-500" : null} ${
                        isDisabled ? "bg-blue-100" : null
                    } ${uppercase ? "uppercase" : null}`}
                    placeholder={placeholder}
                    name={name}
                />
            </div>
            {error && isTouched ? (
                <div className="text-red-500 text-sm">{error as string}</div>
            ) : null}
        </div>
    );
};

interface CustomDateInputProps<T> {
    name: string;
    label?: string;
    placeholder?: string;
    errors?: FormikErrors<T>;
    touched?: FormikTouched<T>;
    min?: number;
    required?: boolean;
    isDisabled?: boolean;
    locale?: string;
}

const CustomDateInput = <T,>({
    name,
    label,
    placeholder,
    errors,
    touched,
    min,
    required = false,
    isDisabled = false,
    locale = "fr-FR",
}: CustomDateInputProps<T>) => {
    const error = errors[name as keyof T];
    const isTouched = touched[name as keyof T];

    const [field, meta] = useField({ name });
    const { setFieldValue } = useFormikContext();

    const dateInputRef = useRef(null);
    const [dateValue, setDateValue] = useState("");

    const handleChange = (event) => {
        const inputDate = new Date(event.target.value);

        if (!isNaN(inputDate.getTime())) {
            const formattedDate = inputDate.toLocaleDateString(locale);
            setDateValue(formattedDate);
            setFieldValue(name, formattedDate);
        } else {
            setDateValue(event.target.value);
            setFieldValue(name, event.target.value);
        }
    };

    useEffect(() => {
        const today = new Date();
        const formattedDate = today.toLocaleDateString(locale);

        if (dateInputRef.current) {
            dateInputRef.current.value = field.value;
            setDateValue(field.value);
        }
    }, [field.value]);

    return (
        <div className="flex flex-col w-full py-2">
            <div className="p-1 text-md font-semibold truncate">
                {label} {dateValue}
                <span className="text-danger"> {required ? "*" : null} </span>
            </div>
            <Field
                ref={dateInputRef}
                disabled={isDisabled}
                type={"date"}
                value={dateValue}
                onChange={handleChange}
                min={min}
                className={`border rounded-lg border-gray-400  ${
                    error && isTouched ? "border-red-500" : "border-gray-400"
                }  ${!error && isTouched ? "border-green-500" : null} ${
                    isDisabled ? "bg-blue-100" : null
                }`}
                placeholder={placeholder}
                name={name}
            />
            {error && isTouched ? (
                <div className="text-red-500 text-sm">{error as string}</div>
            ) : null}
        </div>
    );
};

interface CustomSelectProps<T> {
    name: string;
    label?: string;
    placeholder: string;
    options: any[];
    optionValueField: string;
    optionLabelField: string;
    defaultValue?: string;
    errors?: FormikErrors<T>;
    touched?: FormikTouched<T>;
    required?: boolean;
    icon ? : IconType;
    isDisabled ? : boolean;
}

const CustomSelect = <T,>({
    name,
    placeholder,
    label,
    options,
    optionValueField,
    optionLabelField,
    defaultValue,
    errors,
    touched,
    required = false,
    icon: Icon,
    isDisabled = false
}: CustomSelectProps<T>) => {
    const error = errors[name as keyof T];
    const isTouched = touched[name as keyof T];

    return (
        <div className=" flex flex-col py-2">
            <div className="p-1 text-md font-semibold truncate">
                {label}{" "}
                <span className="text-danger"> {required ? "*" : null} </span>
            </div>
            <div className="flex w-full">
                <div
                    className={`flex bg-blue-100 py-2 px-4 items-center justify-center border-y border-l border-gray-400 text-sm  ${
                        error && isTouched
                            ? "border-red-500"
                            : "border-gray-400"
                    }  ${!error && isTouched ? "border-green-500" : null}
                        `}
                >
                    {Icon && <Icon />}
                    {!Icon && <BsDot />}
                </div>
                <Field
                    as="select"
                    name={name}
                    defaultValue={defaultValue}
                    className={` w-full border border-gray-400 text-sm  ${
                        error && isTouched
                            ? "border-red-500"
                            : "border-gray-400"
                    }  ${!error && isTouched ? "border-green-500" : null} ${
                        isDisabled ? "bg-blue-100" : null
                    }`}
                >
                    <option value="" disabled>
                        {placeholder}
                    </option>
                    {options?.map((option, index) => (
                        <option
                            key={index}
                            value={option[optionValueField] as string}
                            className="text-black"
                        >
                            {option[optionLabelField] as string}
                        </option>
                    ))}
                </Field>
            </div>

            {error && isTouched ? (
                <div className="text-red-500 text-sm">{error as string}</div>
            ) : null}
        </div>
    );
};

interface CustomCheckboxProps<T> {
    name: string;
    label: string;
    errors?: FormikErrors<T>;
    touched?: FormikTouched<T>;
}

const CustomCheckbox = <T,>({
    name,
    label,
    errors,
    touched,
}: CustomCheckboxProps<T>) => {
    const error = errors ? errors[name as keyof T] : null;
    const isTouched = touched ? touched[name as keyof T] : false;

    return (
        <div className="form-group form-check">
            <Field
                type="checkbox"
                className={`form-check-input ${
                    error && isTouched
                        ? "is-invalid border-danger"
                        : "border-secondary"
                } ${!error && isTouched ? "border-green-500" : null} `}
                name={name}
            />
            <label className="form-check-label" htmlFor={name}>
                {label}
            </label>
            {error && isTouched ? (
                <div className="invalid-feedback">{error as string}</div>
            ) : null}
        </div>
    );
};

interface CustomFileInputProps<T> {
    name: string;
    label?: string;
    placeholder?: string;
    errors?: FormikErrors<T>;
    touched?: FormikTouched<T>;
    required?: boolean;
}

const CustomFileInput = <T,>({
    name,
    label,
    placeholder,
    errors,
    touched,
    required = false,
}: CustomFileInputProps<T>) => {
    const [selectedImage, setSelectedImage] = useState<
        string | ArrayBuffer | null
    >(null);
    const fileInputRef = useRef<HTMLInputElement>(null);
    const error = errors && errors[name as keyof T];
    const isTouched = touched && touched[name as keyof T];

    const handleFileChange = (event, form) => {
        const file = event.currentTarget.files[0];
        form.setFieldValue(name, file);

        const reader = new FileReader();
        reader.onload = () => {
            setSelectedImage(reader.result);
        };
        reader.readAsDataURL(file);
    };

    const handleReset = (form) => {
        setSelectedImage(null);
        form.setFieldValue(name, null);
        if (fileInputRef.current) {
            fileInputRef.current.value = "";
        }
    };

    return (
        <div className=" col-span-3 grid w-full py-2">
            <div className="p-1 text-md font-semibold truncate">
                {label}{" "}
                <span className="text-danger">{required ? "*" : null}</span>
            </div>
            <Field name={name}>
                {({ field, form }) => (
                    <div>
                        <input
                            type="file"
                            ref={fileInputRef}
                            className="hidden"
                            onChange={(event) => handleFileChange(event, form)}
                        />
                        <div
                            className={`flex relative justify-center items-center border rounded-lg border-gray-400 p-2 h-[90px] ${
                                error && isTouched
                                    ? "border-red-500"
                                    : "border-gray-400"
                            } ${
                                !error && isTouched ? "border-green-500" : null
                            } cursor-pointer`}
                            onClick={() => fileInputRef.current?.click()}
                        >
                            {selectedImage ? (
                                <img
                                    src={selectedImage as string}
                                    alt="Selected"
                                    className="h-[80px] "
                                />
                            ) : (
                                <span>{placeholder}</span>
                            )}

                            {selectedImage && (
                                <button
                                    type="button"
                                    className="absolute top-3 right-3 hover:underline"
                                    onClick={() => handleReset(form)}
                                >
                                    <Avatar
                                        size="sm"
                                        icon={<FaTimes />}
                                        isBordered
                                        className="bg-transparent"
                                    />
                                </button>
                            )}
                        </div>
                    </div>
                )}
            </Field>
            {error && isTouched ? (
                <div className="text-red-500 text-sm">{error as string}</div>
            ) : null}
        </div>
    );
};

export default CustomFileInput;

const CustomSubmitButton: FunctionComponent<{
    loading: boolean;
    label: string;
    loadingLabel: string;
}> = ({ loading, label, loadingLabel }) => {
    return (
        <>
            <button
                type="submit"
                className="btn btn-primary"
                disabled={loading}
            >
                {loading ? (
                    <div className="d-flex justify-centent-center gap-2">
                        <span
                            className="spinner-border spinner-border-sm"
                            role="status"
                            aria-hidden="true"
                        ></span>
                        <span className="ml-2"> {loadingLabel} </span>
                    </div>
                ) : (
                    <span>{label} </span>
                )}
            </button>
        </>
    );
};

export {
    CustomFormWrapper,
    CustomTextInput,
    CustomSubmitButton,
    CustomSelect,
    CustomCheckbox,
    CustomFileInput,
    CustomDateInput,
};
