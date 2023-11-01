<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../Content/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="../../Scripts/js/jquery-2.0.0.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="../../Scripts/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="../../Content/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font awesome 5 -->

    <link href="../../Content/fonts/fontawesome/css/all.min.css" rel="stylesheet" />
    <!-- custom style -->
    <link href="../../Content/css/ui.css" rel="stylesheet" type="text/css" />
    <link href="../../Content/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../../Content/css/toast.css" rel="stylesheet" type="text/css" />

    <!-- custom javascript -->

</head>

<body>
    <?php

    session_start();
    include("../../db_connect.php");
    function formatCurrencyVND($number)
    {
        $formattedNumber = number_format($number, 0, ',', '.') . ' VND';
        return $formattedNumber;
    }
    ?>
    <header class="section-header">
        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3 col-md-12">
                        <a href="<?php echo '../Home/index.php'; ?>" class="brand-wrap">
                            <img src="../../Images/Picture2.png" style="width:90%" height="60%">
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <form action="../LOAISANPHAM/DanhSachSanPham.php" method="get" class="search-header">
                            <div class="input-group w-100">
                                <input type="text" class="form-control"
                                    placeholder="Tìm kiếm theo tên sản phẩm hoặc mã sản phẩm" name="id">

                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i> Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header">
                                <a href="../GIOHANG/index.php?makh=$_SESSION['MAKH'] " class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-shopping-cart"></i>
                                        <?php
                                        if (isset($_SESSION["MAKH"])) {
                                            $cartCount = $_SESSION["SLGH"];
                                            echo '<span class="notify" id="CartCount">' . $cartCount . '</span>';
                                        }
                                        ?>

                                    </div>
                                    <small class="text"> Giỏ hàng </small>
                                </a>
                            </div>
                            <div class="widget-header mr-3">
                                <a href="@Url.Action(" Detail","KHACHHANG",new { makh=Session["MAKH"]})"
                                    class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-user"></i>

                                    </div>
                                    <small class="text"> Cá nhân </small>
                                </a>
                            </div>
                            <?php if (isset($_SESSION["MAKH"])): ?>
                                <!-- Nếu đã đăng nhập -->
                                <div class="widget-header mr-3">
                                    <a href="../Authentication/DangXuat.php" class="widget-view">
                                        <div class="icon-area">
                                            <i class="fa fa-sign-out-alt"></i>
                                        </div>
                                        <small class="text"> Đăng xuất </small>
                                    </a>
                                </div>
                            <?php else: ?>
                                <!-- Nếu chưa đăng nhập -->
                                <div class="widget-header mr-3">
                                    <a href="../AUTHENTICATION/DangNhap.php" class="widget-view" id="DangNhapBtn">
                                        <div class="icon-area">
                                            <i class="fa fa-sign-in-alt"></i>
                                        </div>
                                        <small class="text"> Đăng nhập </small>
                                    </a>
                                </div>
                                <div class="widget-header mr-3">
                                    <a href="../AUTHENTICATION/DangKy.php" class="widget-view" id="DangKyBtn">
                                        <div class="icon-area">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <small class="text"> Đăng ký </small>
                                    </a>
                                </div>
                            <?php endif; ?>


                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->
    </header> <!-- section-header.// -->
    <div id="toast_updateCart">
        <div class="toast-content">
            <i class="fas fa-solid fa-check check"></i>

            <div class="message">

                <span class="text text-2">Giỏ hàng đã được cập nhật</span>
            </div>
        </div>
        <i class="fa fa-times close"></i>

        <div class="progress"></div>
    </div>