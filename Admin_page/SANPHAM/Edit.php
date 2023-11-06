<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require("../shared/header.php");
    require("../../db_connect.php")
    ?>

    <h2 class="heading">Chỉnh sửa thông tin sản phẩm</h2>
    <form action="" method="post">
        <div class="form-group">
            <label class="control-label col-md-2">Tên sản phẩm</label>
            <input type="text" name="tenSP" class="form-control col-md-10" id="TENSP">
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Đơn giá</label>
            <input type="text" name="donGia" class="form-control col-md-10" id="DONGIA">
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Số lượng</label>
            <input type="text" name="soLuong" class="form-control col-md-10" id="SOLUONG">
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Mô tả</label>
            <input type="text" name="moTa" class="form-control col-md-10" id="MOTA">
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Ảnh</label>
            <div class="col-md-10">
                <input type="file" name="image" value="Chọn ảnh" id="ANH">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Loại sản phẩm</label>

            <select name="MATH" id="MATH" class="form-control col-md-10">
                <?php
                $query = "SELECT TENLOAISP FROM loaisanpham;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["TENLOAISP"] . "</option>";
                    }
                }
                ?>
            </select>

        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Thương hiệu</label>
            <select name="MATH" id="MATH" class="form-control col-md-10">
                <?php
                $query = "SELECT TENTHUONGHIEU FROM thuonghieu;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["TENTHUONGHIEU"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>


        <div class="form-group">
            <label class="control-label col-md">Thông số kĩ thuật</label>


            <label class="control-label col-md-10 d-flex">HỆ ĐIỀU HÀNH</label>
            <select name="HEDIEUHANH" id="HEDIEUHANH" class="form-control col-md-10">
                <?php
                $query = "SELECT DISTINCT HEDIEUHANH FROM thongsokythuat;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["HEDIEUHANH"] . "</option>";
                    }
                }
                ?>
            </select>

            <label class="control-label col-md-10 d-flex">RAM</label>
            <select name="RAM" id="RAM" class="form-control col-md-10">
                <?php
                $query = "SELECT DISTINCT RAM FROM thongsokythuat;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["RAM"] . "</option>";
                    }
                }
                ?>
            </select>

            <label class="control-label col-md-10 d-flex">ROM</label>
            <select name="ROM" id="ROM" class="form-control col-md-10">
                <?php
                $query = "SELECT DISTINCT ROM FROM thongsokythuat;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["ROM"] . "</option>";
                    }
                }
                ?>
            </select>

            <label class="control-label col-md-10 d-flex">Kích cỡ màn hình</label>
            <select name="KICHCOMANHINH" id="KICHCOMANHINH" class="form-control col-md-10">
                <?php
                $query = "SELECT DISTINCT KICHCOMANHINH FROM thongsokythuat;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["KICHCOMANHINH"] . "</option>";
                    }
                }
                ?>
            </select>

            <label class="control-label col-md-10 d-flex">Vy xử lí</label>
            <select name="VIXULY" id="VIXULY" class="form-control col-md-10">
                <?php
                $query = "SELECT DISTINCT VIXULY FROM thongsokythuat;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["VIXULY"] . "</option>";
                    }
                }
                ?>
            </select>

            <label class="control-label col-md-10 d-flex">PIN</label>
            <select name="PIN" id="PIN" class="form-control col-md-10">
                <?php
                $query = "SELECT DISTINCT PIN FROM thongsokythuat;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["PIN"] . "</option>";
                    }
                }
                ?>
            </select>

            <label class="control-label col-md-10 d-flex">CAMERA</label>
            <select name="CAMERA" id="CAMERA" class="form-control col-md-10">
                <?php
                $query = "SELECT DISTINCT CAMERA FROM thongsokythuat;";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) <> 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<option value=" . ">" . $rows["CAMERA"] . "</option>";
                    }
                }
                ?>
            </select>





        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Lưu" class="btn btn-primary" />
            </div>
        </div>

    </form>

    <?php
require("../shared/footer.php");
?>
</body>

</html>