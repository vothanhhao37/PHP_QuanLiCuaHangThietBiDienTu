<?php
include("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
?>
<?php
if (isset($_POST['invoiceID'])) $invoiceID = $_POST["invoiceID"]; else $invoiceID = "";
if (isset($_POST['productID'])) $productID = $_POST["productID"]; else $productID = "";
if (isset($_POST['quantity'])) $quantity = $_POST["quantity"]; else $quantity = "0";
if (isset($_POST['price'])) $price = $_POST["price"]; else $price = "0";
if (isset($_POST["create"])) {
    //Kiểm tra xem trong kho đã có chi tiết hóa đơn tồn tại chưa
    $getAllInvoiceItems_sql = "SELECT * FROM CHITIETHOADON WHERE mahoadon = '$invoiceID' AND masp = '$productID';";
    $allInvoiceItems = mysqli_query($conn, $getAllInvoiceItems_sql);
    if (!empty(mysqli_fetch_row($allInvoiceItems)))
    {
        toPage("Create.php","Đã tồn tại chi tiết đơn hàng","alert alert-danger");
    }

    //Kiểm tra xem số lượng tồn kho có thỏa mãn hay không 
    $getQuantity = "SELECT SOLUONG FROM SANPHAM WHERE masp = '$productID';";
    $Quantity = mysqli_fetch_row(mysqli_query($conn,$getQuantity));

    if ($quantity > $Quantity[0])
    {
        toPage("Create.php","Không đủ số lượng tồn kho", "alert alert-danger");
    }

    //Thêm vào cơ sở dữ liệu
    $sql = "INSERT INTO CHITIETHOADON VALUES ('$invoiceID','$productID', '$quantity', '$price')";
    mysqli_query($conn, $sql);
    toPage("Index.php","Thêm  chi tiết hóa đơn thành công!","alert alert-success");
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
                            echo "<option value='$row[0]'>$row[0]</option>";
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
                            echo "<option value='$row[0]'>$row[0]</option>";
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Số lượng </label>
                <input type="number" class="form-control ml-2"  value="<?php echo $quantity ?>" name="quantity" style="width:82%">
            </div>
            <div class="form-group">
                <label>Đơn giá xuất</label>
                <input type="number" class="form-control ml-2"  value="<?php echo $price ?>" name="price" style="width:82%">
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Tạo mới" class="btn btn-success" name="create" />
                </div>
            </div>
    </form>
</div>

<div>
</div>

</div>