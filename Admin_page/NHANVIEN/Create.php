<?php
include("../shared/header.php");
?>
<?php
require("../../db_connect.php");
require("../shared/function.php");

$sql = "SELECT MANV from nhanvien ORDER BY MANV DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$maNV = (int) substr($row['MANV'], 2);
$maNV = $maNV + 1;
$maNV = "NV" . str_pad($maNV, 4, "0", STR_PAD_LEFT);

function adminCheck()
{
    $check = $_SESSION["isadmin"];
    error_log($check);
    if ($check !== true) {
        header("./Index.php");
        exit;
    }
}



if (isset($_POST['taomoi'])) {
    $sql = "INSERT INTO nhanvien values ('$maNV', '" . $_POST['tennv'] . "', '" . $_POST['diachi'] . "', '" . $_POST['sdt'] . "', '" . $_POST['email'] . "', '" . $_POST['cmnd'] . "', '" . $_POST['chucvu'] . "', '" . $_POST['gioitinh'] . "', '" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . "')";
    $result = mysqli_query($conn, $sql);
    toPage("./Index.php", "Thêm nhân viên thành công!", "alert alert-success");
}

?>
<!-- Start body -->
<div class="container">
    <h2 style="text-align:center">Thêm nhân viên</h2>
    <form action="" method="POST">
        <div class="form-horizontal">
            <a class="btn btn-primary" href="Index.php">Trở về trang danh sách</a>
            <?php
            $sql = "SELECT MANV from NHANVIEN ";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
                <label>Mã nhân viên </label>
                <input type="text" class="form-control ml-2" readonly value="<?php echo $maNV; ?>" name="maNV"
                    style="width:82%">
            </div>

            <div class="form-group">
                <label>Tên nhân viên</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tennv" required>
                </div>
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <div class="col-md-10">
                    <input type="text" name="diachi" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <div class="col-md-10">
                    <input type="text" name="sdt" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="col-md-10">
                    <input type="text" name="email" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label>CMND</label>
                <div class="col-md-10">
                    <input type="text" name="cmnd" class="form-control" require>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">Chức vụ</label>
                <div class="col-md-10">
                    <select name="chucvu" class="form-control">
                        <option value='Quản lý'>Quản lý</option>
                        <option value='Kế toán'>Kế toán</option>
                        <option value='Bảo vệ'>Bảo vệ</option>
                        <option value='Bán hàng'>Bán hàng</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-2">Giới tính</label>
                <div class="col-md-10">
                    <select name="gioitinh" class="form-control">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Tài khoản</label>
                <div class="col-md-10">
                    <input type="text" name="username" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>Mật khẩu</label>
                <div class="col-md-10">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <lable>ISADMIN</lable>
                <div class="col-md-10">
                    <select name="isadmin" class="form-control">
                        <option value=1>True</option>
                        <option value=0>False</option>
                    </select>

                </div>
            </div>



            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Thêm nhân viên" class="btn btn-success" name="taomoi" />
                </div>
            </div>


    </form>
</div>
<!-- End body -->

<?php
require("../shared/footer.php");
