<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" content="{{ csrf_token() }}" />
    <title>Laravel Test 1</title>

  

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('css/bootstrap.customize.css') !!}" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{!! asset('css/sb-admin-2.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('assets/web/css/admin.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap-treeview.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Laravel Test 1</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('events.index') }}" class="nav-link {{ request()->is('api/v1/events') ? 'active' : '' }} {{ request()->is('api/v1/events/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Events</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer 
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
            </div>
        </footer>-->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <script src="{!! asset('js/bootstrap-treeview.js') !!}"></script>

    <!-- AdminLTE -->
    <script src="{{ url('assets/dist/js/adminlte.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('assets/dist/js/demo.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ url('assets/dist/js/pages/dashboard3.js') }}"></script> --}}

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>

    <!-- Jquery Validate -->
    <script src="{!! asset('js/jquery.validate.min.js') !!}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).on("click", ".delete-btn", function (e) {
            e.preventDefault();
    
            var that = $(this);
    
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                text: 'You won\'t be able to undo this action.',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then(function (result) {
                if (result.value) {
                    that.find("form").submit();
                }
            })
        });

        $('.btn-close-alert').click(function() {
            $(this).closest('.alert-div').fadeOut("normal", function() {
                $(this).remove();
            });
        });
    </script>
    @yield('script')
</body>
</html>
