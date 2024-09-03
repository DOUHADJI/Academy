import {
  Button,
  Modal,
  ModalBody,
  ModalContent,
  ModalFooter,
  ModalHeader,
  useDisclosure,
} from '@nextui-org/react';
import axios from 'axios';
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { SuccessToast } from './CustomToast';
import { FaPowerOff } from 'react-icons/fa';
import { CustomModal } from './CustomModal';

const LogoutModal = ({ isOpen, onOpenChange }) => {
  const [loading, setLoading] = useState(false);

  const navigate = useNavigate();
  const handleClick = async () => {
    setLoading(true);
    const res = await axios.post('/logout');
    if (res?.data?.status === 'success') {
      SuccessToast('Déconnexion', 'vous avez été déconnecté avec succès');
      navigate('/');
    }
    setLoading(false);
  };
  return (
    <>
      <CustomModal open={isOpen} setOpen={onOpenChange} title="Déconnexion" size={'lg'}>
        <div className="text-center">
          {' '}
          Vous êtes sur le point de vous déconnecter. <br />{' '}
          <strong>Continuer ?</strong>
        </div>

        <div className="flex justify-end gap-3 py-4">
          <Button className="rounded-none" onClick={() => onOpenChange} color="default">
            Annuler
          </Button>
          <Button isLoading={loading} onPress={handleClick} color='danger' className='rounded-none'>
            {loading && 'Déconnexion en cours...'}
            {!loading && 'Se déconnecter'}
          </Button>
        </div>
      </CustomModal>
      {/* <Modal
        isOpen={isOpen}
        onOpenChange={onOpenChange}
        className="rounded-none"
      >
        <ModalContent>
          {(onClose) => (
            <>
              <ModalHeader>
                <strong>Déconnexion</strong>
              </ModalHeader>
              <ModalBody>
                <div className="text-center">
                  {' '}
                  Vous êtes sur le point de vous déconnecter. <br />{' '}
                  <strong>Continuer ?</strong>
                </div>
              </ModalBody>
              <ModalFooter>

              </ModalFooter>
            </>
          )}
        </ModalContent>
      </Modal> */}
    </>
  );
};

export default LogoutModal;
