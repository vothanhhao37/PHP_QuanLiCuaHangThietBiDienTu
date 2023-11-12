<?php

require("../../db_connect.php");
require("../shared/function.php");
$maTSKT = $_GET['id'];
$sql = "SELECT HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN, CAMERA  FROM thongsokythuat WHERE MATSKT = '$maTSKT'";
$result = mysqlI_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["xoa"])) {
        $sql_xoa = "DELETE FROM thongsokythuat WHERE MATSKT = '$maTSKT'";
        mysqli_query($conn, $sql_xoa);
        header('Location:Index.php');
}
include("../shared/header.php");
?>
<div class="container">
        <h2 style="text-align:center">Xóa thông số kỹ thuật</h2>
        <h3>Bạn có chắc muốn xóa?</h3>
        <hr />
        <dl class="dl-horizontal">
                <dt>
                        Hệ điều hành
                </dt>

                <dd>
                        <?php
                        echo $row['HEDIEUHANH'];
                        ?>
                </dd>

                <dt>
                        RAM
                </dt>

                <dd>
                        <?php
                        echo $row['RAM'];
                        ?>
                </dd>

                <dt>
                        ROM
                </dt>

                <dd>
                        <?php
                        echo $row['ROM'];
                        ?>
                </dd>

                <dt>
                        Kích cỡ màn hình
                </dt>

                <dd>
                        <?php
                        echo $row['KICHCOMANHINH'];
                        ?>
                </dd>

                <dt>
                        Vi xử lý
                </dt>

                <dd>
                        <?php
                        echo $row['VIXULY'];
                        ?>
                </dd>

                <dt>
                        PIN
                </dt>

                <dd>
                        <?php
                        echo $row['PIN'];
                        ?>
                </dd>

                <dt>
                        CAMERA
                </dt>

                <dd>
                        <?php
                        echo $row['CAMERA'];
                        ?>
                </dd>
        </dl>

        <form action="" method="post">
                <div class="form-actions no-color">
                        <input type="submit" value="Xóa" class="btn btn-danger" name="xoa" /> |
                        <a href="./Index.php">Trở về trang danh sách</a>
                </div>
        </form>
</div>
<?php
include("../shared/footer.php");
?>