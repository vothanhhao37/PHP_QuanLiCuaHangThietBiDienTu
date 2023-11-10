<?php
require("../shared/header.php");
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

$find_sql = "SELECT tennv, tenkh, ngaytao, tinhtrangdonhang FROM hoadon, khachhang, nhanvien WHERE hoadon.mahoadon = '$id' AND hoadon.manv = nhanvien.manv  AND hoadon.makh = khachhang.makh;";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_assoc($find_result);
$customerName = $row['tenkh'];
$employeeName = $row['tennv'];
$createAt = $row['ngaytao'];
$status = $row['tinhtrangdonhang'];

if (isset($_POST['delete'])) {
    //Kiểm tra xem có xung đột khóa ngoại hay không (bảng chi tiết hóa đơn)
    $getAllForeignID_sql = "SELECT mahoadon FROM chitiethoadon";
    $allForeignID = mysqli_query($conn, $getAllForeignID_sql);
    while ($checker = mysqli_fetch_row($allForeignID)) {
        if ($_GET["id"] == $checker[0]) {
            $alert_type = "alert alert-danger";
            $alert = "Hãy xóa các bản ghi có liên quan trước!";
            toPage("./Delete.php",$alert,$alert_type,$id);
        }
    }
    $delete_sql = "DELETE FROM hoadon WHERE hoadon.mahoadon = '$id';";
    mysqli_query($conn, $delete_sql); {
        $alert_type = "alert alert-success";
        $alert = "Xóa hóa đơn thành công.";
        toPage("./Index.php",$alert,$alert_type);
    }
}
?>
<!-- Start body -->

<div class="container">
    <h2 style="text-align:center">Xóa đơn hàng</h2>
    <?php include("../shared/alert.php"); ?>
    <h3>Bạn có chắc muốn xóa</h3>
    <a href="./Index.php" class="btn btn-primary">Trở về</a>
    <div>

        <hr />
        <dl class="dl-horizontal">
            <dt>
                Mã hóa đơn
            </dt>
            <dd>
                <?php echo $id; ?>
            </dd>
            <dt>
                Ngày tạo
            </dt>

            <dd>
                <?php echo $createAt; ?>
            </dd>

            <dt>
                Tình trạng đơn hàng
            </dt>

            <dd>
                <?php echo $status; ?>
            </dd>

            <dt>
                Tên khách hàng
            </dt>

            <dd>
                <?php echo $customerName; ?>
            </dd>

            <dt>
                Tên nhân viên
            </dt>

            <dd>
                <?php echo $employeeName; ?>
            </dd>

        </dl>
        <form action="" method="post" class="form-actions no-color">
            <input type="submit" value="Xóa" name="delete" class="btn btn-danger" />
        </form>
    </div>

</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>