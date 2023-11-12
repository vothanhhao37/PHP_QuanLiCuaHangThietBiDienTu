<?php
require("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
?>

<?php

$alert_type = "none";
$alert = "";


$maNV = $_GET['id'];
$find_sql = "SELECT MANV, TENNV, DIACHI, SDT, EMAIL, CMND, CHUCVU, GIOITINH, ISADMIN FROM nhanvien WHERE MANV = '$maNV'";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_assoc($find_result);
$tenNV = $row['TENNV'];
$diachi = $row['DIACHI'];
$sdt = $row['SDT'];
$email = $row['EMAIL'];
$cmnd = $row['CMND'];
$chucvu = $row['CHUCVU'];
$gioitinh = $row['GIOITINH'];
$isadmin = $row['ISADMIN'];



if (isset($_POST['edit'])) {
    toPage("./Edit.php", "", "");
}
?>
<!-- Start body -->

<div class="container">
    <h2 style="text-align:center">THÔNG TIN CHI TIẾT NHÂN VIÊN</h2>

    <div>

        <hr />
        <dl class="dl-horizontal">
            <dt>
                Mã nhân viên
            </dt>
            <dd>
                <?php echo $maNV; ?>
            </dd>
            <dt>
                Họ và tên
            </dt>

            <dd>
                <?php echo $tenNV; ?>
            </dd>

            <dt>
                Địa chỉ
            </dt>

            <dd>
                <?php echo $diachi; ?>
            </dd>

            <dt>
                Số điện thoại
            </dt>

            <dd>
                <?php echo $sdt; ?>
            </dd>

            <dt>
                Email
            </dt>

            <dd>
                <?php echo $email; ?>
            </dd>

            <dt>
                CMND
            </dt>

            <dd>
                <?php echo $cmnd; ?>
            </dd>

            <dt>
                Chức vụ
            </dt>

            <dd>
                <?php echo $chucvu; ?>
            </dd>

            <dt>
                Giới tính
            </dt>

            <dd>
                <?php echo $gioitinh; ?>
            </dd>

            <dt>
                ISADMIN
            </dt>

            <dd>
            <?php echo ($isadmin==1)? 'TRUE':'FALSE' ?>
            </dd>




        </dl>
        <form action="" method="post" class="form-actions no-color">
            <a class="btn btn-primary" href="./Index.php">Trở về trang danh sách</a>
            <a class="btn btn-primary" href="./Edit.php?id=<?php echo $_GET["id"] ?>">Chỉnh sửa</a>
        </form>
    </div>
</div>


<!-- End body -->

<?php
require("../shared/footer.php");
?>