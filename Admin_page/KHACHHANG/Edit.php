<?php
require("../../db_connect.php");
require("../shared/function.php");
$maKH = $_GET['id'];
$sql = "SELECT MAKH, TENKH, DIACHI, SDT, EMAIL, CMND, TAIKHOAN, MATKHAU  FROM khachhang WHERE MAKH = '$maKH'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["luu"])) {
        $sql = "UPDATE khachhang SET TENKH = '" . $_POST['tenkh'] . "', DIACHI = '" . $_POST['diachi'] . "', 
                SDT = '" . $_POST['sdt'] . "', EMAIL = '" . $_POST['email'] . "', 
                CMND = '" . $_POST['cmnd'] . "', TAIKHOAN = '" . $_POST['taikhoan'] . "', MATKHAU = '" . $_POST['matkhau'] . "'
                WHERE MAKH = '" . $maKH . "'";
        $result = mysqli_query($conn, $sql);
        header('Location:index.php');

}
include("../shared/header.php");
?>
<div class="container">
        <h2 style="text-align:center">Chỉnh sửa</h2>


        <form action="" method="POST">

                <div class="form-horizontal">
                        <h2>Khách hàng</h2>
                        <hr />
                        <div class="form-group">
                                <label class="control-label col-md-2">Mã khách hàng</label>
                                <input type="text" class="form-control ml-2" readonly value="<?php echo $maKH ?>"
                                        name="makh" style="width:82%">
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Tên khách hàng</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="tenkh" required
                                                value="<?php echo $row['TENKH'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Địa chỉ</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="diachi" required
                                                value="<?php echo $row['DIACHI'] ?>">
                                </div>

                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Số điện thoại</label>

                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="sdt" required
                                                value="<?php echo $row['SDT'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Email</label>

                                <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" required
                                                value="<?php echo $row['EMAIL'] ?>">
                                </div>

                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">CMND</label>

                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="cmnd" required
                                                value="<?php echo $row['CMND'] ?>">
                                </div>

                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Tài khoản</label>

                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="taikhoan"
                                                value="<?php echo $row['TAIKHOAN'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Mật khẩu</label>

                                <div class="col-md-10">
                                        <input type="password" class="form-control" name="matkhau"
                                                value="<?php echo $row['MATKHAU'] ?>">
                                </div>

                        </div>

                        <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                        <input type="submit" value="Lưu" class="btn btn-primary px-3"
                                                name="luu" />
                                </div>
                        </div>

                </div>
        </form>

        <div>
                <a href="./Index.php">Trở về trang danh sách</a>
        </div>
</div>
<?php
include("../shared/footer.php");
?>