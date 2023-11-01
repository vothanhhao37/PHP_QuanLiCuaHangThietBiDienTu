<?php
include '../Shared_Layout/header.php';


?>
<title>Đăng nhập</title>

<div class="row justify-content-md-center mt-5 mb-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Đăng nhập</h4>
            </div>
            <div class="card-body">
                <form action="DangNhap_Check.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_GET['error']; ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="TAIKHOAN">Tên đăng nhập</label>
                        <input type="text" name="TAIKHOAN" id="TAIKHOAN" class="form-control"
                            placeholder="Tên tài khoản"
                            value="<?php echo isset($_POST['TAIKHOAN']) ? $_POST['TAIKHOAN'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="MATKHAU">Mật khẩu</label>
                        <input type="password" name="MATKHAU" id="MATKHAU" class="form-control" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Đăng nhập" />
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center mt-4" style="font-size:20px">Chưa có tài khoản? <a href="DangKy.php">Đăng
                ký</a></p>
        <br><br>
    </div>

</div>
<?php include '../Shared_Layout/footer.php' ?>