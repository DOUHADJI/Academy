import React from "react";
import { toast } from "react-toastify";

const showToast = (type: string, title: string, content: string) => {
    let toastType;
    switch (type) {
        case "success":
            toastType = toast.success;
            break;
        case "error":
            toastType = toast.error;
            break;
        case "warning":
            toastType = toast.warning;
            break;
        case "info":
        default:
            toastType = toast.info;
            break;
    }

    toastType(
        <div className="">
            <strong className="text-black">{title}</strong>
            <br />
            <span className="text-xs">{content}</span>
        </div>,
        {
            position: "top-right",
            autoClose: 2000,
            hideProgressBar: true,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
        },
    );
};

export const SuccessToast = (title: string, content: string) =>
    showToast("success", title, content);
export const ErrorToast = (title: string, content: string) =>
    showToast("error", title, content);
export const WarningToast = (title: string, content: string) =>
    showToast("warning", title, content);
export const InfoToast = (title: string, content: string) =>
    showToast("info", title, content);
