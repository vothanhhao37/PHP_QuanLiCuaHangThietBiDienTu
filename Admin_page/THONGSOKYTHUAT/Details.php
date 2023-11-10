<?php
require("../../db_connect.php");
require("../shared/function.php");
$maTSKT = $_GET['id'];
$sql = "SELECT MATSKT, HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN, CAMERA  FROM thongsokythuat WHERE MATSKT = '$maTSKT'";
$result = mysqlI_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
include("../shared/header.php");
?>

<div class="container">
        <h2 style="text-align:center">Thông tin chi tiết</h2>
        <h4>Thông số kỹ thuật</h4>
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
        <p>
                <a href="./Edit.php?id=<?php echo $maTSKT ?>">Chỉnh sửa</a> |
                <a href="./index.php">Trở về trang danh sách</a>
        </p>
</div>

<?php
include("../shared/footer.php");
?>