import React, { Dispatch } from 'react';
import {
  Fragment,
  FunctionComponent,
  PropsWithChildren,
  ReactNode,
  SetStateAction,
} from 'react';
import { Dialog, Transition } from '@headlessui/react';
import { Modal, ModalHeader, ModalContent, ModalBody } from '@nextui-org/react';

export const CustomModal: FunctionComponent<{
  open: boolean;
  setOpen: any;
  title: string;
  size?: any;
  children: ReactNode;
}> = ({ open, setOpen, title, size = '3xl', children }) => {
  return (
    <Modal
      isOpen={open}
      size={size}
      scrollBehavior={'outside'}
      onOpenChange={setOpen}
      isDismissable={false}
      placement="center"
      className="bg-white rounded-none"
    >
      <ModalContent>
        {(onClose) => (
          <>
            <ModalHeader>
              <strong className="font-black text-md text-gray-600 py-2 my-2 uppercase border-b-2 border-gray-400 w-full">
                {title}
              </strong>
            </ModalHeader>
            <ModalBody>{children}</ModalBody>
          </>
        )}
      </ModalContent>
    </Modal>
  );
};
