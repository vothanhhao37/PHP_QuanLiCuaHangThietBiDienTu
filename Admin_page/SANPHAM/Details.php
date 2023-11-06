<?php
include("../../db_connect.php");
$maSP = $_GET['maSP'];
$sql_sanpham = "SELECT TENSP, DONGIA, SOLUONG, MOTA, ANH, TENLOAISP, TENTHUONGHIEU, HEDIEUHANH
FROM ((sanpham join loaisanpham on sanpham.MALOAISP = loaisanpham.MALOAISP) join thuonghieu on
sanpham.MATH = thuonghieu.MATH) join thongsokythuat on sanpham.MATSKT=thongsokythuat.MATSKT
WHERE sanpham.MASP = '$maSP'";
$result = mysqlI_query($conn, $sql_sanpham);
$row = mysqli_fetch_assoc($result);
include("../shared/header.php");
?>

<h2 style="text-align:center">Thông tin chi tiết</h2>

<div class="container">
    <h4>Sản phẩm</h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Tên sản phẩm
        </dt>

        <dd>
            <?php
            echo $row['TENSP'];
            ?>
        </dd>

        <dt>
            Đơn giá
        </dt>

        <dd>
            <?php
            echo $row['DONGIA'];
            ?>
        </dd>

        <dt>
            Số lượng
        </dt>

        <dd>
            <?php
            echo $row['SOLUONG'];
            ?>
        </dd>

        <dt>
            Mô tả
        </dt>

        <dd>
            <?php
            echo $row['MOTA'];
            ?>
        </dd>

        <dt>
            Ảnh
        </dt>

        <dd>
            <img class="" width="30%" src="<?php $anh = $row['ANH'];
            echo "../../Images/" . $anh ?>  ">
        </dd>

        <dt>
            Loại sản phẩm
        </dt>

        <dd>
            <?php
            echo $row['TENLOAISP'];
            ?>
        </dd>

        <dt>
            Thương hiệu
        </dt>

        <dd>
            <?php
            echo $row['TENTHUONGHIEU'];
            ?>
        </dd>

        <dt>
            Hệ điều hành
        </dt>

        <dd>
            <?php
            echo $row['HEDIEUHANH'];
            ?>
        </dd>

    </dl>
</div>
<p>
    <a href="./Edit.php?maSP=<?php echo $maSP ?>">Chỉnh sửa</a> |
    <a href="./index.php">Trở về trang danh sách</a>
</p>
<?php
include("../shared/footer.php");
?>