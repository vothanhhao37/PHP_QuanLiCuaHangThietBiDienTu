<?php
include("../shared/header.php");
?>
<?php
include("../../db_connect.php");
$sql = "SELECT MANV from hoadon ORDER BY MANV ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$maNV = (int) substr($row['MANV'], 2);
$maNV = $maNV + 1;
$maNV = "NV" . str_pad($maNV, 4, "0", STR_PAD_LEFT);


if (isset($_POST["taomoi"])) {
    $sql = "INSERT INTO sanpham VALUES ('$maNV', '" . $_POST['TENSP'] . "', '" . $_POST['DONGIA'] . "', 
        '" . $_POST['SOLUONG'] . "', '" . $_POST['MOTA'] . "', '" . $_FILES["Avatar"]["name"] . "', '" . $_POST['loaisp'] . "',
        '" . $_POST['thuonghieu'] . "', '" . $_POST['matskt'] . "')";
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
                <input type="text" class="form-control ml-2" readonly value="<?php echo $maNV ?>" name="maNV"
                    style="width:82%">
            </div>

            <div class="form-group">
                <label>Tên nhân viên</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tennv">
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
                    <input type="text" name="sdt" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="col-md-10">
                    <input type="text" name="email" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>CMND</label>
                <div class="col-md-10">
                    <input type="text" name="cmnd" class="form-control">
                </div>
            </div>

            <?php
            $sqlChucvu = "SELECT DISTINCT CHUCVU FROM nhanvien;";
            $resultChucvu = mysqli_query($conn, $sqlChucvu);
            ?>
            <div class="form-group">
                <label class="control-label col-md-2">Chức vụ</label>
                <div class="col-md-10">
                    <select name="chucvu" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($resultChucvu)) {
                            echo "<option selected value='$row[6]'>$row[0]</option>";
                        } ?>
                    </select>
                </div>
            </div>

            <?php
            $sqlGioiTinh = "SELECT DISTINCT GIOITINH FROM nhanvien;";
            $resultGioiTinh = mysqli_query($conn, $sqlGioiTinh);
            ?>
            <div class="form-group">
                <label class="control-label col-md-2">Giới tính</label>
                <div class="col-md-10">
                    <select name="gioitinh" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($resultGioiTinh)) {
                            echo "<option selected value='$row[7]'>$row[0]</option>";
                        } ?>
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
?>