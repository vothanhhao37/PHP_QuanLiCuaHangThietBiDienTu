<?php
require("../../db_connect.php");
require("../shared/function.php");
$maTSKT = $_GET['id'];
$sql = "SELECT MATSKT, HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN, CAMERA  FROM thongsokythuat WHERE MATSKT = '$maTSKT'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["luu"])) {
        $sql = "UPDATE thongsokythuat SET HEDIEUHANH = '" . $_POST['hedieuhanh'] . "', RAM = '" . $_POST['ram'] . "', 
        ROM = '" . $_POST['rom'] . "', KICHCOMANHINH = '" . $_POST['manhinh'] . "', 
        VIXULY = '" . $_POST['vixuly'] . "', PIN = '" . $_POST['pin'] . "', CAMERA = '" . $_POST['camera'] . "'
                WHERE MATSKT = '" . $maTSKT . "'";
        $result = mysqli_query($conn, $sql);
        header('Location:index.php');

}
include("../shared/header.php");
?>

<h2 style="text-align:center">Chỉnh sửa</h2>

<div class="container">
<form action="" method="POST">
        <div class="form-horizontal">
            <h4>Thông số kỹ thuật</h4>
            <hr />
            <div class="form-group">
                                <label class="control-label col-md-2">Mã thông số kỹ thuật</label>
                                <input type="text" class="form-control ml-2" readonly value="<?php echo $maTSKT ?>"
                                        name="matskt" style="width:82%">
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Hệ điều hành</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="hedieuhanh" required
                                                value="<?php echo $row['HEDIEUHANH'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">RAM</label>
                                <div class="col-md-10">

                                        <input type="number" class="form-control" name="ram" required
                                                value="<?php echo $row['RAM'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">ROM</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="rom" required
                                                value="<?php echo $row['ROM'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Kích cỡ màn hình</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="manhinh" required
                                                value="<?php echo $row['KICHCOMANHINH'] ?>">

                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-2">Vi xử lý</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="vixuly" required
                                                value="<?php echo $row['VIXULY'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">PIN</label>
                                <div class="col-md-10">

                                        <input type="number" class="form-control" name="pin" required
                                                value="<?php echo $row['PIN'] ?>">

                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Camera</label>
                                <div class="col-md-10">

                                        <input type="text" class="form-control" name="camera" required
                                                value="<?php echo $row['CAMERA'] ?>">

                                </div>
                        </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Lưu" class="btn btn-primary" name="luu" />
                </div>
            </div>
        </div>
</form>
    <div>
        <a href="./Index.php">Trở về trang danh sách</a>
    </div>
</div>


<?php
include("../shared/footer.php");
?>
