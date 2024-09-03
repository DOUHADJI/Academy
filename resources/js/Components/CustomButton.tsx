import { Spinner } from "@nextui-org/react";
import React,  { Children, FunctionComponent, MouseEventHandler, ReactNode } from "react";

const CustomButton: FunctionComponent<{
    color?: "default" | "current" | "white" | "primary" | "secondary" | "success" | "warning" | "danger" | undefined;
    children: ReactNode;
    onPress?: MouseEventHandler<HTMLButtonElement>;
    isLoading?: boolean;
    className?: string;
    type?: "button" | "reset" | "submit";
    isTextUppercase?: boolean;
}> = ({
    color = "default",
    children,
    onPress = (e) => {console.log(e)},
    isTextUppercase,
    isLoading = false,
    type,
    className,
}) => {
    return (
        <>
            <button
                type={type ? type : "button"}
                onClick={onPress}
                className={`bg-${color} py-4 px-8 my-4
                    ${color !== "default" && "text-white"}
                    ${isTextUppercase && "uppercase"} ${className}`}
            >
                <div className="flex items-center justify-center gap-2 font-semibold">
                    {isLoading && <Spinner size="sm" color="white" />}
                    {children}
                </div>
            </button>
        </>
    );
};

export default CustomButton;
