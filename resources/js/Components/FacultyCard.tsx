import React, { Dispatch, FunctionComponent, SetStateAction } from "react";
import { useNavigate } from "react-router-dom";
import { Button, Card, CardBody } from "@nextui-org/react";
import { FacultyType } from "@/types/modelsTypes";

interface FacultyCardProps {
    faculty : FacultyType;
    icon?: React.ReactNode;
    data?: any;
    isUnavailable?: boolean;
    isSelected ?: boolean;
    setSelectedFaculty : Dispatch<SetStateAction<FacultyType| undefined>>
}

const FacultyCard: FunctionComponent<FacultyCardProps> = ({
    faculty,
    icon,
    data = null,
    isUnavailable = false,
    isSelected = false,
    setSelectedFaculty
}) => {
    const navigate = useNavigate();
    return (
        <button
            onClick={() => setSelectedFaculty(faculty)}
            disabled={isUnavailable}
            className={` ${isSelected ? "bg-yellow-200" : "bg-gray-100"}`}
        >
            <div className="shadow-sm">
                <div className="flex justify-start items-center gap-4 px-4 h-full py-4">
                    {icon && (
                        <div className="text-center mb-1">
                            {React.cloneElement(icon as React.ReactElement, {
                                className: "text-black mb-1",
                                size: 20,
                            })}
                        </div>
                    )}
                    {isUnavailable && (
                        <div className="text-gray-400">
                            (Bientôt disponible)
                        </div>
                    )}
                    <p className="uppercase text-black font-bold text-xs">
                        {faculty?.name}
                    </p>
                </div>
            </div>
        </button>
    );
};

export default FacultyCard;
