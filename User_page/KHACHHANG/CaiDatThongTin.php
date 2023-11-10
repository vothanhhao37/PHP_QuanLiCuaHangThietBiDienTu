<?php
include("../LOGIN_REQUIRED/LogIn_Required.php"); 
include '../Shared_Layout/header.php';


$result = mysqli_query($conn, "SELECT * FROM khachhang WHERE khachhang.MAKH = '{$_SESSION['MAKH']}'");

?>


<title>Cài đặt thông tin</title>

<section class="section-pagetop bg-gray">
    <div class="container">
        <h2 class="title-page">Tài khoản của tôi</h2>
    </div> <!-- container //  -->
</section>


<section class="section-content padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                <nav class="list-group">
                    <a class="list-group-item " href="Detail.php"> Thông tin chung </a>
                    <a class="list-group-item" href="DonDatHang.php"> Đơn hàng </a>
                    <a class="list-group-item active" href="CaiDatThongTin.php">Cài đặt thông tin</a>
                </nav>
            </aside> <!-- col.// -->
            <?php if (mysqli_num_rows($result) <> 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <main class="col-md-9">

                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="CapNhatThongTin.php" class="row">
                                    <div class="col-md-9">
                                        <div class="form-row">
                                            <div class="col form-group display-flex">
                                                <div class="d-flex justify-content-between">
                                                    <label>Họ và tên</label>
                                                    <small class="text-danger">
                                                        <?php if (isset($_GET['tenkh_error']))
                                                            echo $_GET['tenkh_error'] ?>
                                                        </small>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="form-control" name="TENKH" id="TENKH" value="<?php if (isset($row['TENKH']))
                                                            echo $row['TENKH'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col form-group">
                                                    <div class="d-flex justify-content-between">
                                                        <label>Địa chỉ</label>
                                                        <small class="text-danger">
                                                        <?php if (isset($_GET['diachi_error']))
                                                            echo $_GET['diachi_error'] ?>
                                                        </small>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="form-control" name="DIACHI" id="DIACHI" value="<?php if (isset($row['DIACHI']))
                                                            echo $row['DIACHI'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col form-group">
                                                <div class="d-flex justify-content-between">
                                                        <label>Số điện thoại</label></label>
                                                        <small class="text-danger">
                                                        <?php if (isset($_GET['sdt_error']))
                                                            echo $_GET['sdt_error'] ?>
                                                        </small>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="form-control" name="SDT" id="SDT" value="<?php if (isset($row['SDT']))
                                                            echo $row['SDT'] ?>">

                                                    </div>
                                                </div>
                                                <div class="col form-group">
                                                <div class="d-flex justify-content-between">
                                                        <label>Email</label></label>
                                                        <small class="text-danger">
                                                        <?php if (isset($_GET['email_error']))
                                                            echo $_GET['email_error'] ?>
                                                        </small>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="form-control" name="EMAIL" id="EMAIL" value="<?php if (isset($row['EMAIL']))
                                                            echo $row['EMAIL'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col form-group">
                                                    <label>CMND</label>
                                                    <div>
                                                        <input type="text" class="form-control" name="CMND" id="CMND" value="<?php if (isset($row['CMND']))
                                                            echo $row['CMND'] ?>">

                                                    </div>
                                                </div>
                                                <div class="col form-group">
                                                    <label>Tên tài khoản</label>
                                                    <div>
                                                        <input disabled type="text" class="form-control" name="TAIKHOAN"
                                                            id="TAIKHOAN" value="<?php if (isset($row['TAIKHOAN']))
                                                            echo $row['TAIKHOAN'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-2 col-md-10">
                                                    <input type="submit" value="Lưu" name="saveChanges"
                                                        class="btn btn-primary mr-2" id="save_info" />
                                                    <a href="DoiMatKhau.php" class="btn btn-light">Đổi mật khẩu</a>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </main> <!-- col.// -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>

<script>
 
</script>

<?php
include '../Shared_Layout/footer.php';
?>

