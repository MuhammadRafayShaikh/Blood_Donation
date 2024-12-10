<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <title></title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('../admin/assets/css/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('../admin/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../admin/assets/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../admin/assets/css/responsive.bootstrap4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('../admin/assets/css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('../admin/assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../admin/assets/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                </li>
            </ul>
            <ul class="navbar-nav">
                <div class="dropdown">

                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello {{ Auth::user()->name }}

                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item logout">Logout</button>
                        </form>
                    </div>
                </div>
            </ul>
        </nav>



        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <a href="../dashboard/dashboard.php" class="brand-link">
                <img src="../adminimages/images/site-logo/1649843978blood.jpg" alt="" style="width:200px;">
            </a>

            <a href="../dashboard/dashboard.php" class="brand-link">
                <span class="brand-text font-weight-light">Blood Donation</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.donor') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Donors
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blood') }}" class="nav-link">
                                <i class="nav-icon fas fa-clinic-medical"></i>
                                <p>
                                    Blood Group
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.city') }}" class="nav-link">
                                <i class="nav-icon fas fa-city"></i>
                                <p>
                                    City
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.report') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blood Group</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- /.navbar -->

        @yield('content')


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <a href="https://muhammadrafayshaikh.github.io/Monument/" target="blank">Muhammad
                    Rafay Shaikh</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('../admin/assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('../admin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('../admin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/buttons.print.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('./admin/assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('../admin/assets/js/admin.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
            }).buttons().container().appendTo('.col-md-6:eq(0)');

            var report = $('#group-report').DataTable({
                ajax: {
                    'processing': true,
                    'serverSide': true,
                    'serverMethod': 'POST',
                    'url': '../php_files/reports.php',
                    'data': function(data) {
                        var val = $('.blood_group option:selected').val();
                        data.blood_group = val;
                    },
                    'columns': [{
                            data: 's_no'
                        },
                        {
                            data: 'donor_img'
                        },
                        {
                            data: 'donor_name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'phone'
                        },
                        {
                            data: 'city_name'
                        },
                        {
                            data: 'name'
                        },
                    ],
                },
                dom: 'Bfrtip',
                buttons: ['pdf', 'print']
            });
            // reload report table
            $('#blood-group-report').submit(function(e) {
                e.preventDefault();
                report.ajax.reload();
            });

            // load image with jquery
            $('.image').change(function() {
                readURL(this);
            });

            // preview image before upload
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        });
    </script>

</body>

</html>
