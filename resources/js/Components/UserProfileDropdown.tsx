import React, { useContext, useState } from 'react';
import {
  Dropdown,
  DropdownTrigger,
  DropdownMenu,
  DropdownItem,
  Button,
  Avatar,
  Badge,
  useDisclosure,
} from '@nextui-org/react';
import { FaUser  } from 'react-icons/fa6';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import { SuccessToast } from './CustomToast';
import { FaCaretDown, FaPowerOff } from 'react-icons/fa';
import { userContext } from '@/Contexts/UserContext';
import UserProfilInfosModal from './UserProfilInfosModal';
import LogoutModal from './LogoutModal';

const UserProfileDropdown = () => {
  const [dropdownOpen, setDropdownOpen] = useState(false);
  const { user, setUser } = useContext(userContext);
  const [openProfilModal, setOpenProfilModal] = useState(false);
  const navigate = useNavigate();
  const { isOpen, onOpen, onOpenChange } = useDisclosure();
  const toggleDropdown = () => {
    setDropdownOpen((prevState) => !prevState);
  };

  return (
    <>
      <Dropdown  className='rounded-none px-2'>
        <DropdownTrigger>
          <div className="flex justify-end items-center gap-3 px-2 cursor-pointer">
            <Badge content="" color="success" size="lg">
              <Avatar
                color="success"
                className="bg-green-100"
                isBordered
                size="sm"
                icon={<FaUser  className="text-green-900" size={19} />}
              />
            </Badge>

            <div className="flex items-center">
              <div>
                <div className="text-start text-xs font-bold text-gray-500">
                  {user?.name}
                </div>
                <div className="text-start text-green-600 pt-1 text-xs">
                  {user?.profil?.name}
                </div>
              </div>
              <div className="flex justify-center items-center px-2">
                <FaCaretDown className="text-dark" />
              </div>
            </div>
          </div>
        </DropdownTrigger>
        <DropdownMenu aria-label="Actions Utilisateur">
          <DropdownItem onClick={() => setOpenProfilModal(true)} className="bg-danger">
            <div className="">Informations du profil</div>
          </DropdownItem>
          <DropdownItem onClick={onOpen}>
            <div className="flex items-center justify-start gap-2">
              <FaPowerOff className="text-red-400" /> Se déconnecter
            </div>
          </DropdownItem>
        </DropdownMenu>
      </Dropdown>
      <LogoutModal isOpen={isOpen} onOpenChange={onOpenChange} />
      <UserProfilInfosModal
        open={openProfilModal}
        setOpen={setOpenProfilModal}
      />
    </>
  );
};

export default UserProfileDropdown;
