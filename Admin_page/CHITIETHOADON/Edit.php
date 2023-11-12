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
    $alert = "Mã chi tiết hóa đơn không tồn tại.";
    toPage("./Index.php", $alert, $alert_type);
}

//Kiểm tra xem id có tồn tại hay không
$check = true;
$getallid_sql = "SELECT mahoadon, masp FROM chitiethoadon";
$allid = mysqli_query($conn, $getallid_sql);
$id = explode("-", $_GET["id"]);
if (count($id) != 2) {
    $alert_type = "alert alert-danger";
    $alert = "Mã chi tiết hóa đơn không tồn tại.";
    toPage("./Index.php", $alert, $alert_type);
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
    toPage("./Index.php", $alert, $alert_type);
}

//redefine id
$id = $_GET["id"];

$find_sql = "SELECT * FROM CHITIETHOADON WHERE mahoadon = '$invoiceID' AND masp = '$productID';";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_row($find_result);
$quantity = (int)$row[2];
$price = (int)$row[3];

if (isset($_POST['edit'])) {
    $invoiceID_input = $_POST['invoiceID'];
    $productID_input = $_POST['productID'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //Kiểm tra xem trong kho đã có chi tiết hóa đơn tồn tại chưa
    if ($invoiceID != $invoiceID_input || $productID != $productID_input) {
        $getAllInvoiceItems_sql = "SELECT * FROM CHITIETHOADON WHERE mahoadon = '$invoiceID_input' AND masp = '$productID_input';";
        $allInvoiceItems = mysqli_query($conn, $getAllInvoiceItems_sql);
        if (!empty(mysqli_fetch_row($allInvoiceItems))) {
            toPage("Edit.php", "Đã tồn tại chi tiết đơn hàng", "alert alert-danger", $id);
        }
    }

    $sql = "UPDATE chitiethoadon SET mahoadon = '$invoiceID_input', masp = '$productID_input', soluong = '$quantity', dongiaxuat = '$price' WHERE mahoadon = '$invoiceID' AND masp = '$productID';";
    mysqli_query($conn, $sql);
    toPage("./Index.php", "Đã chỉnh sửa thành công", "alert alert-success");
}
?>

<div class="container">
    <h2 style="text-align:center">Lập chi tiết hóa đơn</h2>
    <?php include("../shared/alert.php"); ?>
    <form action="" method="POST">
        <div class="form-horizontal">
            <a class="btn btn-primary" href="Index.php">Trở về trang danh sách</a>
            <?php
            $sql = "SELECT mahoadon from hoadon order by mahoadon";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
                <label>Mã hóa đơn</label>
                <div class="col-md-10">
                    <select name="invoiceID" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($result)) {
                            $selected = ($row[0] == $invoiceID) ? "selected" : "";
                            echo "<option value='$row[0]' $selected>$row[0]</option>";
                        } ?>
                    </select>
                </div>
            </div>

            <?php
            $sql = "SELECT masp from sanpham order by masp";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
                <label>Mã khách hàng</label>
                <div class="col-md-10">
                    <select name="productID" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($result)) {
                            $selected = ($row[0] == $productID) ? "selected" : "";
                            echo "<option value='$row[0]' $selected>$row[0]</option>";
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Số lượng </label>
                <input type="number" class="form-control ml-2" value="<?php echo $quantity ?>" name="quantity" style="width:82%">
            </div>
            <div class="form-group">
                <label>Đơn giá xuất</label>
                <input type="number" class="form-control ml-2" value="<?php echo $price ?>" name="price" style="width:82%">
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Chỉnh sửa" class="btn btn-success" name="edit" />
                </div>
            </div>
    </form>
</div>

<div>
</div>

</div>