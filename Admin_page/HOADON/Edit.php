<?php
include("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
?>
<?php

$alert_type = "none";
$alert = "";
//Kiểm tra xem có id được truyền vào hay không
if (!isset($_GET["id"])) {
    $alert_type = "alert alert-danger";
    $alert = "Mã hóa đơn không tồn tại.";
    toPage("./Index.php",$alert,$alert_type);
}

//Kiểm tra xem id có tồn tại hay không
$check = true;
$getallid_sql = "SELECT mahoadon FROM hoadon";
$allid = mysqli_query($conn, $getallid_sql);
while ($checker = mysqli_fetch_row($allid)) {
    if ($_GET["id"] == $checker[0]) {
        $check = false;
    }
}
if ($check == true) {
    $alert_type = "alert alert-danger";
    $alert = "Mã hóa đơn không tồn tại.";
    toPage("./Index.php",$alert,$alert_type);
}

$id = $_GET["id"];
$sql = "SELECT * from hoadon WHERE hoadon.MAHOADON = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

$customerID = $row[2];
$employeeID = $row[1];
$createAt = $row[3];
$status = $row[4];

if (isset($_POST["edit"])) {
    $customerID = $_POST["maKH"];
    $employeeID = $_POST["maNV"];
    $createAt = $_POST["ngaytaohoadon"];
    $status = $_POST["tinhtrang"];
    $sql = "UPDATE hoacdon SET makh = '$customerID', manv = '$employeeID', ngaytao = '$createAt', tinhtrangdonhang = '$status' WHERE mahoadon = '$id';";
    mysqli_query($conn, $sql);
    toPage("./Index.php","Chỉnh sửa hóa đơn thành công!","alert alert-success");
}

?>

<div class="container">
    <h2 style="text-align:center">Chỉnh sửa hóa đơn</h2>
    <a class="btn btn-primary" href="Index.php">Trở về trang danh sách</a>
    <form action="" method="POST">
        <div class="form-horizontal">
            <div class="form-group">
                <label>Mã hóa đơn </label>
                <input type="text" class="form-control ml-2" readonly value="<?php echo $id ?>" name="MAHP" style="width:82%">
            </div>

            <?php
            $sql = "SELECT MANV, TENNV from NHANVIEN ";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
                <label>Mã nhân viên</label>
                <div class="col-md-10">
                    <select name="maNV" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($result)) {
                            $selected = ($employeeID == $row[0]) ? "selected" : "";
                            echo "<option value='$row[0]' $selected>$row[1]</option>";
                        } ?>

                    </select>


                </div>
            </div>

            <?php
            $sql = "SELECT MAKH, TENKH from KHACHHANG ";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
                <label>Mã khách hàng</label>
                <div class="col-md-10">
                    <select name="maKH" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($result)) {
                            $selected = ($customerID == $row[0]) ? "selected" : "";
                            echo "<option value='$row[0]' $selected>$row[1]</option>";
                        } ?>

                    </select>


                </div>
            </div>

            <div class="form-group">
                <label>Ngày tạo hóa đơn</label>
                <div class="col-md-10">
                    <input type="date" class="form-control" name="ngaytaohoadon">
                </div>
            </div>

            <div class="form-group">
                <label>Tình trạng đơn hàng</label>
                <div class="col-md-10">
                    <select name="tinhtrang" id="" class="form-control">
                        <option value="Hẹn ngày giao" <?php if($status == "Hẹn giao hàng") echo "selected" ?>>Hẹn ngày giao</option>
                        <option value="Đang giao hàng" <?php if($status == "Đang giao hàng") echo "selected" ?>>Đang giao hàng</option>
                        <option value="Giao hàng thành công" <?php if($status == "Giao hàng thành công") echo "selected" ?>>Giao hàng thành công</option>
                        <option value="Giao hàng thất bại" <?php if($status == "Giao hàng thất bại") echo "selected" ?>>Giao hàng thất bại</option>
                        <option value="Chờ xác nhận" <?php if($status == "Chờ xác nhận") echo "selected" ?>>Chờ xác nhận</option>
                        <option value="Đã đặt hàng" <?php if($status == "Đã đặt hàng") echo "selected" ?>>Đã đặt hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Chỉnh sửa" class="btn btn-success" name="edit" />
                </div>
            </div>
    </form>
</div>
</div>