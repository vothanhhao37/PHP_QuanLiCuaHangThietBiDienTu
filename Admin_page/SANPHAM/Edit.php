<?php
require("../../db_connect.php");
require("../shared/function.php");
$maSP = $_GET['maSP'];
$sql_sanpham = "SELECT TENSP, DONGIA, SOLUONG, MOTA, ANH, TENLOAISP, TENTHUONGHIEU, HEDIEUHANH, sanpham.MATSKT
FROM ((sanpham join loaisanpham on sanpham.MALOAISP = loaisanpham.MALOAISP) join thuonghieu on
sanpham.MATH = thuonghieu.MATH) join thongsokythuat on sanpham.MATSKT=thongsokythuat.MATSKT
WHERE sanpham.MASP = '$maSP'";
$result = mysqli_query($conn, $sql_sanpham);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["luu"])) {
        $target_dir = "../../Images/";
        $target_file = $target_dir . basename($_FILES["Avatar"]["name"]);
        $check = getimagesize($_FILES["Avatar"]["tmp_name"]);
        if ($check !== false) {
                move_uploaded_file($_FILES["Avatar"]["tmp_name"], $target_file);
                $sql = "UPDATE sanpham SET TENSP = '" . $_POST['TENSP'] . "', DONGIA = '" . $_POST['DONGIA'] . "', 
                SOLUONG = '" . $_POST['SOLUONG'] . "', MOTA = '" . $_POST['MOTA'] . "', ANH = '" . $_FILES["Avatar"]["name"] . "', 
                MALOAISP = '" . $_POST['loaisp'] . "', MATH = '" . $_POST['thuonghieu'] . "', MATSKT = '" . $_POST['tskt'] . "'
                WHERE MASP = '".$maSP."'";
                $result = mysqli_query($conn, $sql);
                header('Location:index.php');
        }
        ?>
        <script>
                window.alert("Tệp ảnh không hợp lệ");
        </script>
        <?php

}
include("../shared/header.php");
?>
<div class="container">
        <h2 style="text-align:center">Chỉnh sửa</h2>

        <form action="" method="post" enctype="multipart/form-data">

                <div class="form-horizontal">
                        <h4>Sản phẩm</h4>
                        <hr />
                        <div class="form-group">
                                <label class="control-label col-md-2">Mã sản phẩm </label>
                                <input type="text" class="form-control ml-2" readonly value="<?php echo $maSP ?>"
                                        name="MASP" style="width:82%">
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-2">Tên sản phẩm </label>
                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="TENSP" required
                                                value="<?php echo $row['TENSP'] ?>">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Đơn giá</label>
                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="DONGIA" required
                                                value="<?php echo $row['DONGIA'] ?>">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Số lượng</label>
                                <div class="col-md-10">
                                        <input type="number" class="form-control" name="SOLUONG" required
                                                value="<?php echo $row['SOLUONG'] ?>">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Mô tả</label>
                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="MOTA" required
                                                value="<?php echo $row['MOTA'] ?>">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2">Ảnh</label>
                                <div class="col-md-10">
                                        <input type="file" value="Chọn File" name="Avatar" accept="image/*" required />
                                </div>
                        </div>

                        <?php
                        $sql_loaisp = "SELECT TENLOAISP, MALOAISP from loaisanpham ";
                        $result_loaisp = mysqli_query($conn, $sql_loaisp);
                        ?>
                        <div class="form-group">
                                <label class="control-label col-md-2">Loại sản phẩm</label>
                                <div class="col-md-10">
                                        <select name="loaisp" id="" class="form-control">
                                                <?php while ($rows = mysqli_fetch_row($result_loaisp)) {
                                                        if ($row["TENLOAISP"] == $rows[0]) {
                                                                echo "<option selected value='$rows[1]'>$rows[0]</option>";
                                                        } else
                                                                echo "<option value='$rows[1]'>$rows[0]</option>";
                                                } ?>
                                        </select>
                                </div>
                        </div>

                        <?php
                        $sql_thuonghieu = "SELECT TENTHUONGHIEU, MATH from thuonghieu ";
                        $result_thuonghieu = mysqli_query($conn, $sql_thuonghieu);
                        ?>
                        <div class="form-group">
                                <label class="control-label col-md-2">Thương hiệu</label>
                                <div class="col-md-10">
                                        <select name="thuonghieu" id="" class="form-control">
                                                <?php while ($rows = mysqli_fetch_row($result_thuonghieu)) {
                                                        if ($row["TENTHUONGHIEU"] == $rows[0]) {
                                                                echo "<option selected value='$rows[1]'>$rows[0]</option>";
                                                        } else
                                                                echo "<option value='$rows[1]'>$rows[0]</option>";
                                                } ?>
                                        </select>
                                </div>
                        </div>

                        <?php
                        $sql_tskt = "SELECT MATSKT from thongsokythuat ";
                        $result_tskt = mysqli_query($conn, $sql_tskt);
                        ?>
                        <div class="form-group">
                                <label class="control-label col-md-2">Thông số kỹ thuật</label>
                                <div class="col-md-10">
                                        <select name="tskt" id="" class="form-control">
                                                <?php while ($rows = mysqli_fetch_row($result_tskt)) {
                                                        if ($row["MATSKT"] == $rows[0]) {
                                                                echo "<option selected value='$rows[0]'>$rows[0]</option>";
                                                        } else
                                                                echo "<option value='$rows[0]'>$rows[0]</option>";
                                                } ?>
                                        </select>
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
                <a href="./index.php">Trở về trang danh sách</a>
        </div>
</div>