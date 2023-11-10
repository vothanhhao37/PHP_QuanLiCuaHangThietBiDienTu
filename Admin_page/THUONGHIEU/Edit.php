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
    $alert = "Mã thương hiệu không tồn tại.";
    toPage("./Index.php",$alert,$alert_type);
}

//Kiểm tra xem id có tồn tại hay không
$check = true;
$getallid_sql = "SELECT math FROM thuonghieu";
$allid = mysqli_query($conn, $getallid_sql);
while ($checker = mysqli_fetch_row($allid)) {
    if ($_GET["id"] == $checker[0]) {
        $check = false;
    }
}
if ($check == true) {
    $alert_type = "alert alert-danger";
    $alert = "Mã thương hiệu không tồn tại.";
    toPage("./Index.php",$alert,$alert_type);
}

$id = $_GET["id"];
$sql = "SELECT * from thuonghieu WHERE math = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$brandID = $id;
$brandName = $row[1];
$country = $row[2];

if (isset($_POST["edit"])) {
    $brandName = $_POST["brandName"];
    $country = $_POST["country"];
    $sql = "UPDATE thuonghieu SET tenthuonghieu = '$brandName', quocgia = '$country' WHERE math = '$id';";
    mysqli_query($conn, $sql);
    toPage("./Index.php","Chỉnh sửa thương hiệu thành công!","alert alert-success");
}

?>

<div class="container">
    <h2 style="text-align:center">Chỉnh sửa thương hiệu</h2>
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
                    <input type="submit" value="Chỉnh sửa   " class="btn btn-success" name="edit" />
                </div>
            </div>
    </form>
</div>

<div>
</div>

</div>