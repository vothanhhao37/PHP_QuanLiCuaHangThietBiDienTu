<?php
require("../shared/header.php")

    ?>

<?php

$alert_type = "none";
$alert = "";
//Kiểm tra xem có id được truyền vào hay không
if (!isset($_GET["id"])) {
    $alert_type = "alert alert-danger";
    $alert = "Mã sản phẩm không tồn tại.";
    toPage("./Index.php", $alert, $alert_type);
}

//Kiểm tra xem id có tồn tại hay không
$check = true;
$getallid_sql = "SELECT MASP FROM sanpham;";
$allid = mysqli_query($conn, $getallid_sql);
while ($checker = mysqli_fetch_row($allid)) {
    if ($_GET["id"] == $checker[0]) {
        $check = false;
    }
}
if ($check == true) {
    $alert_type = "alert alert-danger";
    $alert = "Mã sản phẩm không tồn tại.";
    toPage("./Index.php", $alert, $alert_type);
}

$id = $_GET["id"];

$find_sql = "SELECT TENSP, DONGIA, SOLUONG, MOTA, ANH FROM sanpham; ";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_assoc($find_result);
$tensp = $row['TENSP'];
$dongia = $row['DONGIA'];
$soluong = $row['SOLUONG'];
$mota = $row['MOTA'];
$anhsp = $row['ANH'];

if (isset($_POST['delete'])) {
    $delete_sql = "DELETE FROM sanpham WHERE sanpham.maSP = '$id';";
    mysqli_query($conn, $delete_sql); {
        $alert_type = "alert alert-success";
        $alert = "Xóa sản phẩm thành công.";
        toPage("./Index.php", $alert, $alert_type);
    }
}
?>

<div class="container">
    <h2 style="text-align:center">Xóa đơn hàng</h2>
    <?php include("../shared/alert.php"); ?>
    <h3>Bạn có chắc muốn xóa</h3>
    <a href="./Index.php" class="btn btn-primary">Trở về</a>
    <div>

        <hr />
        <dl class="dl-horizontal">
            <dt>
                Mã sản phẩm
            </dt>
            <dd>
                <?php echo $id; ?>
            </dd>
            <dt>
                Tên sản phẩm
            </dt>

            <dd>
                <?php echo $tensp; ?>
            </dd>

            <dt>
                Đơn giá
            </dt>

            <dd>
                <?php echo $dongia; ?>
            </dd>

            <dt>
                Số lượng
            </dt>

            <dd>
                <?php echo $soluong; ?>
            </dd>

            <dt>
                Mô tả
            </dt>

            <dd>
                <?php echo $mota; ?>
            </dd>

            <dt>
                Ảnh
            </dt>

            <dd>
                <?php echo $anhsp; ?>
            </dd>


        </dl>
        <form action="" method="post" class="form-actions no-color">
            <input type="submit" value="Xóa" name="delete" class="btn btn-danger" />
        </form>
    </div>

</div>

<?php
require("../shared/footer.php")
    ?>