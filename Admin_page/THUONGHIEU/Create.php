<?php
include("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
?>
<?php

//Auto fill brandID
$sql = "SELECT math from thuonghieu ORDER BY math DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$brandID = (int) substr($row['math'], 2);
$brandID = $brandID + 1;
$brandID = "TH" . str_pad($brandID, 3, "0", STR_PAD_LEFT);
if (isset($_POST['brandName'])) $brandName = $_POST["brandName"]; else $brandName = "";
if (isset($_POST['country'])) $country = $_POST["country"]; else $country = "";
if (isset($_POST["create"])) {
    //Kiểm tra bỏ trống
    if ($brandName == "" || $country == "")
    {
        toPage("Create.php","Không được để trống ô dữ liệu nào","alert alert-danger");
    }
    else 
    {
        //Thêm vào cơ sở dữ liệu
        $sql = "INSERT INTO THUONGHIEU VALUES ('$brandID','$brandName', '$country')";
        mysqli_query($conn, $sql);
        toPage("Index.php","Thêm thương hiệu thành công!","alert alert-success");
    }
}

?>

<div class="container">
    <h2 style="text-align:center">Thêm mới thương hiệu</h2>
    <?php include("../shared/alert.php"); ?>
    <form action="" method="POST">
        <div class="form-horizontal">
            <a class="btn btn-primary" href="Index.php">Trở về trang danh sách</a>
            <div class="form-group">
                <label>Mã thương hiệu</label>
                <input type="text" class="form-control ml-2"  value="<?php echo $brandID ?>" disabled name="brandID" style="width:82%">
            </div>
            <div class="form-group">
                <label>Tên thương hiệu</label>
                <input type="text" class="form-control ml-2"  value="<?php echo $brandName ?>" name="brandName" style="width:82%">
            </div>
            <div class="form-group">
                <label>Quốc gia</label>
                <input type="text" class="form-control ml-2"  value="<?php echo $country ?>" name="country" style="width:82%">
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