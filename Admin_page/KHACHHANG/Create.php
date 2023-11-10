
<?php
require("../../db_connect.php");
require("../shared/function.php");
$sql = "SELECT MAKH from khachhang ORDER BY MAKH DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$maKH = (int) substr($row['MAKH'], 2);
$maKH = $maKH + 1;
$maKH = "KH" . str_pad($maKH, 3, "0", STR_PAD_LEFT);


if (isset($_POST["taomoi"])) {
        $sql = "INSERT INTO khachhang VALUES ('$maKH', '" . $_POST['tenkh'] . "', '" . $_POST['diachi'] . "', 
'" . $_POST['sdt'] . "', '" . $_POST['email'] . "', '" . $_POST['cmnd'] . "', '" . $_POST['taikhoan'] . "'
, '" . $_POST['matkhau'] . "')";
        mysqli_query($conn, $sql);
        header("location: ./Index.php");
}

?>
<?php

include("../shared/header.php");
?>
<div class="container">
        <h2 style="text-align:center">Thêm khách hàng</h2>

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

                                        <input type="text" class="form-control" name="tenkh" required>

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Địa chỉ</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="diachi" required>
                                </div>

                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Số điện thoại</label>

                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="sdt" required>

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Email</label>

                                <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" required>
                                </div>

                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">CMND</label>

                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="cmnd" required>
                                </div>

                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Tài khoản</label>

                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="taikhoan">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Mật khẩu</label>

                                <div class="col-md-10">
                                        <input type="password" class="form-control" name="matkhau">
                                </div>

                        </div>

                        <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                        <input type="submit" value="Tạo mới" class="btn btn-primary px-3"
                                                name="taomoi" />
                                </div>
                        </div>
                        <div>
                                <a href="./Index.php">Trở về trang danh sách</a>
                        </div>
                </div>
        </form>
</div>

<?php
include("../shared/footer.php");
?>