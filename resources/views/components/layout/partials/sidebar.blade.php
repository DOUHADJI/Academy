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
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <x-layout.partials.nav-item 
                    route-title="Backoffice - Ecoles et facultés" 
                    nav-title="Ecoles et facultés" 
                    route="showSchools" icon="fa fa-building"  />


                    <x-layout.partials.nav-item-with-children 
                        nav-title="Admissions" icon="fas fa-list-alt"
                        page-title="Backoffice - Admissions" >

                        <x-layout.partials.nested-nav-item nav-title="En attente" route="showAdmissions" />
                        <x-layout.partials.nested-nav-item nav-title="All" route="allAdmissions" />

                    </x-layout.partials.nav-item-with-children>

                    
                    <x-layout.partials.nav-item-with-children 
                        nav-title="Année scolaire" icon="fas fa-calendar"
                        page-title="" >

                        <x-layout.partials.nested-nav-item nav-title="En cours" route="showYear" />

                    </x-layout.partials.nav-item-with-children>
                   

                </ul>
            </nav>
            <!-- /Admin .sidebar-menu -->
        @endif

        @if (Gate::allows('is-student'))
            <!-- User Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <x-layout.partials.nav-item 
                    route-title="Espace étudiant - Mes informations" 
                    nav-title="Profil etudiant" 
                    route="showStudent" icon="fa fa-home"  />
                   
                    @if($has_admissions())
                    <x-layout.partials.nav-item route-title="Espace étudiant - Choix de parcours" nav-title="Choix de parcours" route="seeAdmission"
                    icon="fa fa-graduation-cap" />
                    @else
                    <x-layout.partials.nav-item route-title="Espace étudiant - Choix de parcours" nav-title="Choix de parcours" route="showAdmission"
                            icon="fa fa-graduation-cap" />
                    @endif
                    
                    <x-layout.partials.nav-item route-title="Espace étudiant - Inscription" nav-title="Inscription" route="showInscription"
                            icon="fa fa-id-badge" />
                    
                    <x-layout.partials.nav-item route-title="Espace étudiant - Fiche UEs" 
                    nav-title="Fiche d'UE" route="seeUes"
                            icon="fa fa-file-alt" />
                          
                   
                    



                </ul>
            </nav>
            <!-- /User .sidebar-menu -->
        @endif

    </div>
    <!-- /.sidebar -->
</aside>
