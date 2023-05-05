@aware(['title'])

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-teal bg-green-900">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-yellow-200 py-4">
        <img src="{{ asset('images/GU-logo.webp') }}" alt="GU Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-bold text-sm text-danger">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image py-6">

                {{-- <i class="fa fa-user text-white text-lg"></i> --}}
                {{-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                {{-- <a href="#" class="d-block">{{ Auth::user() -> name }}</a> --}}
            </div>
        </div>
        @if (Gate::allows('is-admin'))
        <!-- Admin Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <x-layout.partials.nav-item route-title="Backoffice - Ecoles et facultés" nav-title="Ecoles et facultés" route="showSchools" icon="fa fa-building" />


                <x-layout.partials.nav-item-with-children nav-title="Admissions" icon="fas fa-list-alt" page-title="Backoffice - Admissions">

                    <x-layout.partials.nested-nav-item nav-title="En attente" route="showAdmissions" />
                    <x-layout.partials.nested-nav-item nav-title="All" route="allAdmissions" />

                </x-layout.partials.nav-item-with-children>


                <x-layout.partials.nav-item-with-children nav-title="Année scolaire" icon="fas fa-calendar" page-title="Backoffice - Année scolaire en cours">

                    <x-layout.partials.nested-nav-item nav-title="En cours" route="showYear" />
                    <x-layout.partials.nested-nav-item nav-title="+ nouvelle année" route="defineYear" />

                </x-layout.partials.nav-item-with-children>


            </ul>
        </nav>
        <!-- /Admin .sidebar-menu -->
        @endif

        @if (Gate::allows('is-student'))
        <!-- User Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <x-layout.partials.nav-item route-title="Espace étudiant - Mes informations" nav-title="Profil etudiant" route="showStudent" icon="fa fa-user-graduate" />


                <x-layout.partials.nav-item route-title="Espace étudiant - Choix de parcours" nav-title="Choix de parcours" route="seeAdmission" icon="fa fa-graduation-cap" />


                <x-layout.partials.nav-item route-title="Espace étudiant - Inscription" nav-title="Inscription" route="showInscription" icon="fa fa-id-badge" />

                <x-layout.partials.nav-item route-title="Espace étudiant - Fiche UEs" nav-title="Fiche d'UE" route="seeUes" icon="fa fa-file-alt" />

                <x-layout.partials.nav-item route-title="Espace étudiant - Payement" nav-title="Payement" route="seePayment" icon="fa fa-money-bill" />

                <x-layout.partials.nav-item route-title="Espace étudiant - Fiche d'inscription" nav-title="Fiche d'inscription" route="seeInscription" icon="fa fa-file-alt" />

                <x-layout.partials.nav-item route-title="Espace étudiant - Examens" nav-title="Examens" route="showExams" icon="fas fa-pen" />

                <x-layout.partials.nav-item-with-children nav-title="Informations utiles" icon="fas fa-info" page-title="Espace étudiant - Informations utiles">

                    <x-layout.partials.nested-nav-item nav-title="Année Académique" route="studentSeeYear" />

                </x-layout.partials.nav-item-with-children>




            </ul>
        </nav>
        <!-- /User .sidebar-menu -->
        @endif

        @if(Gate::allows('is-professor'))
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <x-layout.partials.nav-item-with-children nav-title="Examinations" icon="fas fa-pen" page-title="Espace professeur - Examinations">

                    <x-layout.partials.nested-nav-item nav-title="+ epreuve" route="showExamsProf" />

                </x-layout.partials.nav-item-with-children>
            </ul>
        </nav>
        @endif

    </div>
    <!-- /.sidebar -->
</aside>
