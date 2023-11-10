<?php
require("../../db_connect.php");
require("../shared/function.php");
$sql = "SELECT MATSKT from thongsokythuat ORDER BY MATSKT DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$maTSKT = (int) substr($row['MATSKT'], 4);
$maTSKT = $maTSKT + 1;
$maTSKT = "TSKT" . str_pad($maTSKT, 3, "0", STR_PAD_LEFT);
if (isset($_POST["taomoi"])) {
        $sql = "INSERT INTO thongsokythuat VALUES ('$maTSKT', '" . $_POST['hedieuhanh'] . "', '" . $_POST['ram'] . "', 
'" . $_POST['rom'] . "', '" . $_POST['manhinh'] . "', '" . $_POST['vixuly'] . "', '" . $_POST['pin'] . "'
, '" . $_POST['camera'] . "')";
        mysqli_query($conn, $sql);
        header("location: ./Index.php");
}

?>
<?php

include("../shared/header.php");
?>
<div class="container">
        <h2 style="text-align:center">Thêm mới</h2>
        <form action="" method="POST">
                <div class="form-horizontal">
                        <h2>Thông số kỹ thuật</h2>
                        <div class="form-group">
                                <label class="control-label col-md-2">Mã thông số kỹ thuật</label>
                                <input type="text" class="form-control ml-2" readonly value="<?php echo $maTSKT ?>"
                                        name="matskt" style="width:82%">
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Hệ điều hành</label>
                                <input type="text" name="hedieuhanh" class="form-control ml-2" style="width:82%">
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">RAM</label>

                                <input type="number" name="ram" class="form-control ml-2" style="width:82%">

                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">ROM</label>
                                <input type="text" name="rom" class="form-control ml-2" style="width:82%">
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Kích cỡ màn hình</label>
                                <input type="text" name="manhinh" class="form-control ml-2" style="width:82%">
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-2">Vi xử lý</label>
                                <input type="text" name="vixuly" class="form-control ml-2" style="width:82%">
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-2">PIN</label>
                                <input type="number" name="pin" class="form-control ml-2" style="width:82%">
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-2">Camera</label>
                                <input type="text" name="camera" class="form-control ml-2" style="width:82%">
                        </div>

                        <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                        <input type="submit" value="Tạo mới" class="btn btn-primary" name="taomoi"/>
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