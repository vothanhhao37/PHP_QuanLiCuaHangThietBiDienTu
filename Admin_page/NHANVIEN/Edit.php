<?php
require("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
    ?>
<?php
$maNV = $_GET['id'];
$find_sql = "SELECT *  FROM nhanvien WHERE MANV = '$maNV'";
$find_result = mysqli_query($conn, $find_sql);
$row = mysqli_fetch_assoc($find_result);



if (isset($_POST['luu'])) {
    $maNV = $_POST['manv'];
    $tenNV = $_POST['tennv'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $cmnd = $_POST['cmnd'];
    $chucvu = $_POST['chucvu'];
    $gioitinh = $_POST['gioitinh'];
    $taikhoan = $_POST['username'];
    $matkhau = $_POST['password'];
    $isadmin = $_POST['isadmin'];
    $editSql = "UPDATE nhanvien SET MANV = '$maNV', TENNV = '$tenNV', DIACHI = '$diachi', SDT = '$sdt', 
    EMAIL = '$email', CMND = '$cmnd', CHUCVU = '$chucvu', GIOITINH = '$gioitinh', TAIKHOAN = '$taikhoan', MATKHAU = '$matkhau', ISADMIN = $isadmin 
    WHERE MANV = '" . $maNV . "'";
    mysqli_query($conn, $editSql);
    toPage("./Index.php", "Đã chỉnh sửa thành công", "alert alert-success");

}
?>
<!-- Start body -->


<div class="container">
    <h2 style="text-align:center">Chỉnh sửa thông tin nhân viên</h2>
    <form action="" method="POST">
        <div class="form-horizontal">

            <div class="form-group">
                <label>Mã nhân viên </label>
                <input type="text" class="form-control ml-2" readonly value="<?php echo $row['MANV']; ?>" name="manv"
                    style="width:82%">
            </div>

            <div class="form-group">
                <label>Tên nhân viên</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tennv" required value="<?php echo $row['TENNV'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <div class="col-md-10">
                    <input type="text" name="diachi" class="form-control" require value="<?php echo $row['DIACHI'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <div class="col-md-10">
                    <input type="text" name="sdt" class="form-control" require value="<?php echo $row['SDT'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="col-md-10">
                    <input type="text" name="email" class="form-control" require value="<?php echo $row['EMAIL'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label>CMND</label>
                <div class="col-md-10">
                    <input type="text" name="cmnd" class="form-control" require value="<?php echo $row['CMND'] ?>">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-md-2">Chức vụ</label>
                <div class="col-md-10">
                    <select name="chucvu" id="" class="form-control">
                    <?php
                        if ($row["CHUCVU"] == 'Quản lý') {
                            echo "<option selected value='Quản lý'>Quản lý</option>";
                            echo "<option value='Kế toán'>Kế toán</option>";
                            echo "<option  value='Bảo vệ'>Bảo vệ</option>";
                            echo "<option  value='Bán hàng'>Bán hàng</option>";
                        } else if($row["CHUCVU"] == 'Kế toán') {
                            echo "<option  value='Quản lý'>Quản lý</option>";
                            echo "<option selected value='Kế toán'>Kế toán</option>";
                            echo "<option  value='Bảo vệ'>Bảo vệ</option>";
                            echo "<option  value='Bán hàng'>Bán hàng</option>";
                        }else if ($row["CHUCVU"] == 'Bảo vệ') {
                            echo "<option  value='Quản lý'>Quản lý</option>";
                            echo "<option  value='Kế toán'>Kế toán</option>";
                            echo "<option selected value='Bảo vệ'>Bảo vệ</option>";
                            echo "<option  value='Bán hàng'>Bán hàng</option>";
                        } else {
                            echo "<option  value='Quản lý'>Quản lý</option>";
                            echo "<option selected value='Kế toán'>Kế toán</option>";
                            echo "<option  value='Bảo vệ'>Bảo vệ</option>";
                            echo "<option selected value='Bán hàng'>Bán hàng</option>";
                        }
                        ?>                        
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-2">Giới tính</label>
                <div class="col-md-10">
                    <select name="gioitinh" id="" class="form-control">
                        <?php
                        if ($row["GIOITINH"] == 'Nam') {
                            echo "<option selected value='Nam'>Nam</option>";
                            echo "<option value='Nữ'>Nữ</option>";
                        } else {
                            echo "<option selected value='Nữ'>Nữ</option>";
                            echo "<option value='Nam'>Nam</option>";
                        }
                        ?>


                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Tài khoản</label>
                <div class="col-md-10">
                    <input type="text" name="username" class="form-control" 
                        value="<?php echo $row['TAIKHOAN'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label>Mật khẩu</label>
                <div class="col-md-10">
                    <input type="password" name="password" class="form-control"
                        value="<?php echo $row['MATKHAU'] ?>">
                </div>
            </div>


            <div class="form-group">
                <lable>ISADMIN</lable>
                <div class="col-md-10">
                    <select name="isadmin" class="form-control">
                        <?php
                        if ($row['ISADMIN'] == 1) 
                            echo "<option selected value=1>True</option>
                            <option value=0>False</option>";

                        
                        else echo "<option value=1>True</option>
                        <option selected value=0>False</option>";
                        ?>
                    </select>

                </div>
            </div>



            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <a class="btn btn-primary" href="Index.php">Trở về trang danh sách</a>
                    <input type="submit" value="Lưu" class="btn btn-success" name="luu" />
                </div>
            </div>


    </form>
</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>