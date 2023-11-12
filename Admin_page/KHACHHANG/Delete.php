<?php
require("../../db_connect.php");
require("../shared/function.php");
$maKH = $_GET['id'];
$sql = "SELECT TENKH, DIACHI, SDT, EMAIL, CMND, TAIKHOAN, MATKHAU  FROM khachhang WHERE MAKH = '$maKH'";
$result = mysqlI_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["xoa"])) {
        $sql = "DELETE FROM khachhang WHERE MAKH = '$maKH'";
        $result = mysqli_query($conn, $sql);
        header('Location:index.php');

}
include("../shared/header.php");
?>

<h2 style="text-align:center">Xóa khách hàng</h2>


<div class="container">
        <h3>Bạn có chắc muốn xóa chứ?</h3>
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