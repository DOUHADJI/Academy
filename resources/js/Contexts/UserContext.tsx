import Loader from '@/Components/Loader';
import axios from 'axios';
import React, {
  FunctionComponent,
  ReactNode,
  createContext,
  useContext,
  useEffect,
  useMemo,
  useState,
} from 'react';

import { useNavigate } from 'react-router-dom';

interface UserProps {
  name: string;
  email: string;
  profil: any;
}

export const userContext = createContext(null);

export const UserContextProvider: FunctionComponent<{
  children: ReactNode;
}> = ({ children }) => {
  const [user, setUser] = useState({});
  const [loading, setLoading] = useState(true);
  const context = { user, setUser };
  const contextMemo = useMemo(() => context, [user]);

  const navigate = useNavigate();

  const getUser = async () => {
    const res = await axios.get('/api/user');
    
    if (res?.status === 200) {
      setUser(res?.data?.user);
      setLoading(false);
    } else {
      navigate('/');
    }
  };

  useEffect(() => {
    getUser();
  }, []);

  return (
    <>
      <userContext.Provider value={contextMemo}>
        {loading && <Loader />}
        {!loading && children}
      </userContext.Provider>
    </>
  );
};
