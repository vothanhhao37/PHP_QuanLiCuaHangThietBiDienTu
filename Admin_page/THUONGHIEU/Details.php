<?php
require("../shared/header.php")
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

$find_sql = "SELECT * FROM thuonghieu WHERE math = '$id';";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_row($find_result);
$brandID = $row[0];
$brandName = $row[1];
$country = $row[2];

if (isset($_POST['edit'])) {
    toPage("./Edit.php","","",$id);
}
?>
<!-- Start body -->

<div class="container">
    <h2 style="text-align:center">Thông tin thương hiệu</h2>
    <?php include("../shared/alert.php"); ?>
    <a href="./Index.php" class="btn btn-primary">Trở về</a>
    <div>

        <hr />
        <dl class="dl-horizontal">
            <dt>
                Mã thương hiệu
            </dt>
            <dd>
                <?php echo $brandID; ?>
            </dd>
            <dt>
                Tên thương hiệu
            </dt>

            <dd>
                <?php echo $brandName; ?>
            </dd>

            <dt>
                Quốc gia
            </dt>

            <dd>
                <?php echo $country; ?>
            </dd>
        </dl>
        <form action="" method="post" class="form-actions no-color">
            <input type="submit" value="Chỉnh sửa" name="edit" class="btn btn-primary " />
        </form>
    </div>

</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>