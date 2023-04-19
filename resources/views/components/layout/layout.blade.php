@php
    $user = $user();
@endphp

<!DOCTYPE html>
<html>
<x-layout.partials.head />

<body class="hold-transition sidebar-mini layout-fixed ">
    <!-- Site wrapper -->
    <div class="wrapper">

        <x-layout.partials.navbar />

        <x-layout.partials.sidebar />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1>{{ $title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li> --}}
                                <li class="breadcrumb-item active">{{ Route::current()->uri }}</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-12 py-12">
                            <!--Content Here -->
                            {{ $slot }}
                            <!-- / Content -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <x-layout.partials.scripts />
</body>

</html>

