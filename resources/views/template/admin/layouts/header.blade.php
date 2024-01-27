<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ $title }}</title>

    <link rel="shortcut icon" href="{{ asset('admin/dist/img/AdminLTELogo.png') }}" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

    {{-- Font Awesome Icons CDNJS  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Jquery CDNJS  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="{{ Route('home.page') }}" target="_blank">
                        <i class="fa-solid fa-eye"></i>
                        Visit Website
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ Route('admin.dashboard') }}" class="brand-link">
                <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                    <div>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Logout
                        </button>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ Route('admin.dashboard') }}" class="nav-link {{ Route::is(['admin.dashboard']) ? 'active':'' }}">
                                <i class="fa-solid fa-gauge nav-icon"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ Route('admin.list.categories') }}" class="nav-link {{ Route::is(['admin.list.categories', 'admin.add.category', 'admin.edit.category']) ? 'active':'' }}">
                                <i class="fa-solid fa-boxes-stacked nav-icon"></i>
                                <p>
                                    Category Management
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ Route('admin.list.users') }}" class="nav-link {{ Route::is(['admin.list.users', 'admin.add.user']) ? 'active':'' }}">
                                <i class="fa-solid fa-user-group nav-icon"></i>
                                <p>
                                    User Management
                                </p>
                            </a>
                        </li>

                        <!--<li class="nav-item">-->
                        <!--    <a href="{{ Route('admin.list.banned.users') }}" class="nav-link {{ Route::is(['admin.list.banned.users']) ? 'active':'' }}">-->
                        <!--        <i class="fa-solid fa-ban nav-icon"></i>-->
                        <!--        <p>-->
                        <!--            Banned Users-->
                        <!--        </p>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <li class="nav-item">
                            <a href="{{ Route('admin.list.gifs') }}" class="nav-link {{ Route::is(['admin.list.gifs']) ? 'active':'' }}">
                                <i class="fa-solid fa-note-sticky nav-icon"></i>
                                <p>
                                    Hottest Images
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ Route('admin.list.user.gif') }}" class="nav-link {{ Route::is(['admin.list.user.gif']) ? 'active':'' }}">
                                <i class="fa-solid fa-note-sticky nav-icon"></i>
                                <p>
                                    User Gifs/Images
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ Route('admin.adds') }}" class="nav-link {{ Route::is(['admin.adds']) ? 'active':'' }}">
                                <i class="fa-solid fa-tv nav-icon"></i>
                                <p>
                                    Advertisement
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ Route('admin.settings') }}" class="nav-link {{ Route::is(['admin.settings']) ? 'active':'' }}">
                                <i class="fa-solid fa-gear nav-icon"></i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Modal For Logout -->
        <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">
                            Are you sure to logout now?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ Route('admin.logout') }}" type="button" class="btn btn-warning text-white">Yes, Logout</a>
                    </div>
                </div>
            </div>
        </div>
