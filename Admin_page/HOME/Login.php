<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../Content/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../Content/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../Content/admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Trang quản trị</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tên tài khoản" name="taikhoan">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div>
                            <button type="submit" class="btn btn-primary btn-block" name="dangnhap">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="../../Content/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../Content/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Content/dist/js/adminlte.min.js"></script>

</body>

</html>
<?php
require("../../db_connect.php");
require("../shared/function.php");
if (isset($_POST["dangnhap"])) {

    if (empty($_POST["taikhoan"]) || empty($_POST["matkhau"])) {
        ?>
        <script>
            window.alert("Thông tin đăng nhập không hợp lệ");
        </script>
        <?php
    } else {
        $sql_admmin = "SELECT TAIKHOAN, MATKHAU, TENNV FROM nhanvien WHERE ISADMIN = 1";
        $result_admin = mysqli_query($conn, $sql_admmin);
        while ($row_admin = mysqli_fetch_assoc($result_admin)) {
            if ($row_admin["TAIKHOAN"] == $_POST["taikhoan"] && $row_admin["MATKHAU"] == $_POST["matkhau"]) {
                $_SESSION['user'] = $row_admin['TENNV'];
                $_SESSION['pass'] = $row_admin['MATKHAU'];
                header("location:../HOME/index.php");
                break;
            }
        }
        ?>
        <script>
            window.alert("Thông tin đăng nhập không hợp lệ");
        </script>
        <?php
    }
}
?>