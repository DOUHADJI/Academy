@aware(['center'])

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-teal bg-green-900">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-yellow-200">
        <img src="{{ asset('images/GU-logo.webp') }}" alt="GU Logo" class="brand-image"
            style="opacity: .8">
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
        @if(Gate::allows('is-admin'))
        <!-- Admin Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ route('showSchools') }}" class="nav-link @if(Route::currentRouteName() == "showSchools")
                        active @endif" >
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Ecoles et facultes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>


                @php
                    $routes = [
                        "showYear",
                        "jj",
                        "jggg",       
                    ]
                @endphp

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link @if(array_search(Route::currentRouteName(), $routes) != null) 
                     active
                    @endif">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Année scolaire
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <x-layout.partials.nested-nav-item title="En cours" route="showYear"  />
    
                    </ul>

                </li>

            </ul>
        </nav>
        <!-- /Admin .sidebar-menu -->
        @endif

        @if(Gate::allows('is-student'))
        <!-- User Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <x-layout.partials.nav-item title="Profil etudiant" route="showStudent" icon="fa fa-home" />
               <x-layout.partials.nav-item title="Choix de parcours" route="showAdmission" icon="fa fa-graduation-cap" />

              

            </ul>
        </nav>
        <!-- /User .sidebar-menu -->
        @endif

    </div>
    <!-- /.sidebar -->
</aside>
