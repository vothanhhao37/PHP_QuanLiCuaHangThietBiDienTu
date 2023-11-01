<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../Content/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../Content/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../Content/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../Content/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../Content/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../Content/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../Content/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../Content/admin/plugins/summernote/summernote-bs4.min.css">
    <link href="../../Content/admin/dist/css/styleAdmin.css" rel="stylesheet" />
    <link href="../../Content/fonts/fontawesome/css/all.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin/pages/home.php" class="nav-link">Trang chủ</a>
                </li>
                
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
               
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../../Content/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Trang admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../Content/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"></a> <a href="logout.php"><i class="fa fa-sign-out-alt"></i></a>
                    </div>
                </div>

            
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Quản lí</li>
                        <li class="nav-item">
                            <a href="hoadon.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Quản lí hóa đơn

                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="chitiethoadon.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Quản lí chi tiết hóa đơn
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="sanpham.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quản lí sản phẩm
                                </p>
                            </a>
                        </li>
                            if is admin show
                                <li class="nav-item">
                                    <a href="nhanvien.php" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>
                                            Quản lí nhân viên
                                        </p>
                                    </a>

                                </li>
                        <li class="nav-item">
                            <a href="khachhang.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Quản lí khách hàng
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="thuonghieu.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Quản lí thương hiệu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="thongsokythuat.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Quản lí thông số kỹ thuật
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Thống kê</li>
                        <li class="nav-item">
                            <a href="thongkedoanhthu.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Thống kê doanh thu
                                </p>
                            </a>

                        </li>
                        <li class="nav-header">Tính toán</li>
                        <li class="nav-item">
                            <a href="tinhtoansoluongbanhang.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Số lượng sản phẩm bán được theo loại sản phẩm
                                </p>
                            </a>

                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Render body here -->
            <!-- Content Header (Page header) -->
        
        
