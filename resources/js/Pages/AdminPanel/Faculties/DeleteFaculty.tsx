import { CustomModal } from '@/Components/CustomModal';
import { SuccessToast } from '@/Components/CustomToast';
import axios from 'axios';
import React, {
  Dispatch,
  FunctionComponent,
  SetStateAction,
  useState,
} from 'react';
import { Button } from '@nextui-org/react';
import { DELETE_FACULTY } from '@/shared/apiEndPoints';

const DeleteFaculty: FunctionComponent<{
  open: boolean;
  setOpen: Dispatch<SetStateAction<boolean>>;
  setUpdateData: Dispatch<SetStateAction<boolean>>;
  item: any;

}> = ({ open, setOpen, item, setUpdateData }) => {
  const [loading, setLoading] = useState<boolean>(false);

  const handleClick = async () => {
    setLoading(true);
    try {
      const res = await axios.delete(DELETE_FACULTY(item?.id));
      if (res?.status === 200) {
        SuccessToast(res?.data?.message?.title, res?.data?.message?.content);
        setLoading(false);
        setOpen(false);
        setUpdateData(true);
      }
    } catch (error) {
      SuccessToast('Erreur produite', error?.message);
      setLoading(false);
      setUpdateData(true);
    }
  };

  return (
    <>
      <CustomModal
        open={open}
        setOpen={setOpen}
        title="Suppression de Module"
        size={'lg'}
      >
        <div className="">
          <div className="text-center py-3">
            Vous êtes sûr de vouloir supprimer le module : <br />{' '}
            <strong className="pt-2"> {item?.name} </strong> ?
          </div>
          <div className="flex justify-end px-4 py-4 gap-4">
            <Button
              className="btn btn-secondary rounded-none"
              onClick={() => setOpen(false)}
            >
              Annuler
            </Button>
            <Button
              isLoading={loading}
              className="text-white bg-red-700 rounded-none"
              type="submit"
              onPress={handleClick}
            >
              Supprimer
            </Button>
          </div>
        </div>
      </CustomModal>
    </>
  );
};

export default DeleteFaculty;
