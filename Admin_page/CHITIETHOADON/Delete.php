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
    $alert = "Mã chi tiết hóa đơn không tồn tại.";
    toPage("./Index.php",$alert,$alert_type);
}

//Kiểm tra xem id có tồn tại hay không
$check = true;
$getallid_sql = "SELECT mahoadon, masp FROM chitiethoadon";
$allid = mysqli_query($conn, $getallid_sql);
$id = explode("-",$_GET["id"]);
if (count($id) != 2)
{
    $alert_type = "alert alert-danger";
    $alert = "Mã chi tiết hóa đơn không tồn tại.";
    toPage("./Index.php",$alert,$alert_type);
}
$invoiceID = $id[0];
$productID = $id[1];
while ($checker = mysqli_fetch_row($allid)) {
    if ($invoiceID == $checker[0] && $productID == $checker[1]) {
        $check = false;
    }
}
if ($check == true) {
    $alert_type = "alert alert-danger";
    $alert = "Mã chi tiết hóa đơn không tồn tại.";
    toPage("./Index.php",$alert,$alert_type);
}

//redefine id
$id = $_GET["id"];

$find_sql = "SELECT * FROM CHITIETHOADON WHERE mahoadon = '$invoiceID' AND masp = '$productID';";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_row($find_result);
$quantity = (int)$row[2];
$price = (int)$row[3];

if (isset($_POST['delete'])) {
    $delete_sql = "DELETE FROM CHITIETHOADON WHERE mahoadon = '$invoiceID' AND masp = '$productID';";
    mysqli_query($conn,$delete_sql);
    toPage("./Index.php","Đã xóa thành công","alert alert-success");
}
?>
<!-- Start body -->

<div class="container">
    <h2 style="text-align:center">Thông tin đơn hàng</h2>
    <?php include("../shared/alert.php"); ?>
    <a href="./Index.php" class="btn btn-primary">Trở về</a>
    <div>

        <hr />
        <dl class="dl-horizontal">
            <dt>
                Mã hóa đơn
            </dt>
            <dd>
                <?php echo $invoiceID; ?>
            </dd>
            <dt>
                Mã khách hàng
            </dt>

            <dd>
                <?php echo $productID; ?>
            </dd>

            <dt>
                Số lượng bán
            </dt>

            <dd>
                <?php echo $quantity; ?>
            </dd>

            <dt>
                Giá bán
            </dt>

            <dd>
                <?php echo $price; ?>
            </dd>
        </dl>
        <form action="" method="post" class="form-actions no-color">
            <input type="submit" value="Xóa" name="delete" class="btn btn-danger " />
        </form>
    </div>

</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>