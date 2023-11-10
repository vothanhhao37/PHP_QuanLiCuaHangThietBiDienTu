<?php
require("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");

$alert_type = "none";
$alert = "";
//Kiểm tra xem có id được truyền vào hay không
if (!isset($_GET["id"])) {
    $alert_type = "alert alert-danger";
    $alert = "Mã nhân viên không tồn tại.";
    toPage("./Index.php", $alert, $alert_type);
}



$id = $_GET["id"];

$find_sql = "SELECT MANV, TENNV, DIACHI, SDT, EMAIL, CMND, CHUCVU, GIOITINH, ISADMIN FROM nhanvien;";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_assoc($find_result);

if (isset($_POST['delete'])) {

    $delete_sql = "DELETE FROM nhanvien WHERE nhanvien.MANV = '$id';";
    mysqli_query($conn, $delete_sql); {
        $alert_type = "alert alert-success";
        $alert = "Xóa nhân viên thành công.";
        toPage("./Index.php", $alert, $alert_type);
    }
}
?>
<!-- Start body -->

<div class="container">
    <h2 style="text-align:center">Xóa nhân viên</h2>
    <?php include("../shared/alert.php"); ?>
    <h3>Bạn có chắc muốn xóa</h3>

    <div>

        <hr />
        <dl class="dl-horizontal">
            <dt>
                Mã nhân viên
            </dt>
            <dd>
                <?php echo $id; ?>
            </dd>
            <dt>
                Tên nhân viên
            </dt>

            <dd>
                <?php echo $row['TENNV']; ?>
            </dd>

            <dt>
                Địa chỉ
            </dt>

            <dd>
                <?php echo $row['DIACHI']; ?>
            </dd>

            <dt>
                Số điện thoại
            </dt>

            <dd>
                <?php echo $row['SDT']; ?>
            </dd>

            <dt>
                Email
            </dt>

            <dd>
                <?php echo $row['EMAIL']; ?>
            </dd>

            <dt>
                CMND
            </dt>

            <dd>
                <?php echo $row['CMND']; ?>
            </dd>

            <dt>
                Chức vụ
            </dt>

            <dd>
                <?php echo $row['CHUCVU']; ?>
            </dd>

            <dt>
                Giới tính
            </dt>

            <dd>
                <?php echo $row['GIOITINH']; ?>
            </dd>

            <dt>
                ISADMIN
            </dt>

            <dd>
                <?php echo $row['ISADMIN']; ?>
            </dd>

        </dl>
        <form action="" method="post" class="form-actions no-color">
            <a href="./Index.php" class="btn btn-primary">Trở về</a>
            <input type="submit" value="Xóa" name="delete" class="btn btn-danger" />
        </form>
    </div>

</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>