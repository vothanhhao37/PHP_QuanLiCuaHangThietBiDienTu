<?php
require("../../db_connect.php");
require("../shared/function.php");
$maKH = $_GET['id'];
$sql = "SELECT TENKH, DIACHI, SDT, EMAIL, CMND, TAIKHOAN, MATKHAU  FROM khachhang WHERE MAKH = '$maKH'";
$result = mysqlI_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
include("../shared/header.php");
?>

<h2 style="text-align:center">Thông tin chi tiết</h2>

<div class="container">
    <h4>Khách hàng</h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Tên khách hàng
        </dt>

        <dd>
            <?php
            echo $row['TENKH'];
            ?>
        </dd>

        <dt>
            Địa chỉ
        </dt>

        <dd>
            <?php
            echo $row['DIACHI'];
            ?>
        </dd>

        <dt>
            Số điện thoại
        </dt>

        <dd>
            <?php
            echo $row['SDT'];
            ?>
        </dd>

        <dt>
            Email
        </dt>

        <dd>
            <?php
            echo $row['EMAIL'];
            ?>
        </dd>

        <dt>
            CMND
        </dt>

        <dd>
            <?php
            echo $row['CMND'];
            ?>
        </dd>

        <dt>
            Tài khoản
        </dt>

        <dd>
            <?php
            echo $row['TAIKHOAN'];
            ?>
        </dd>

        <dt>
            Mật khẩu
        </dt>

        <dd>
            <?php
            echo $row['MATKHAU'];
            ?>
        </dd>

    </dl>
    <p>
        <a href="./Edit.php?id=<?php echo $maKH ?>">Chỉnh sửa</a> |
        <a href="./index.php">Trở về trang danh sách</a>
    </p>
</div>
<?php
include("../shared/footer.php");
?>