import Breadcrumb from "@/Layouts/Breadcrumb";
import { ADMIN_HOME } from "@/Routing/Routes";

const AdminHome = () => {
    return <>
            <Breadcrumb pageTitle="Accueil administration"   previousLabel="Administration"  previousLink={ADMIN_HOME} />

    </>
}

export default AdminHome;
