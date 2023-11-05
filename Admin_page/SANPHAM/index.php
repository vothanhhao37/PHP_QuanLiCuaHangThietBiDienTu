<?php
include("../../db_connect.php");
include("../shared/header.php");
?>
<div class="container">
        <h2 style="text-align:center">Danh sách sản phẩm</h2>

        <a href="./Create.php" class="btn btn-primary m-2">Tạo mới</a>
        <table class="table">
                <tr>
                        <th>
                                Mã sản phẩm
                        </th>
                        <th>
                                Tên sản phẩm
                        </th>
                        <th>
                                Đơn giá
                        </th>
                        <th>
                                Số lượng
                        </th>
                        <th>
                                Loại sản phẩm
                        </th>
                        <th>
                                Thương hiệu
                        </th>
                        <th></th>
                </tr>
                <?php

                $sql = "SELECT MASP, TENSP, DONGIA, SOLUONG, TENLOAISP, TENTHUONGHIEU FROM (sanpham JOIN loaisanpham ON
                sanpham.MALOAISP=loaisanpham.MALOAISP) JOIN thuonghieu ON thuonghieu.MATH=sanpham.MATH ORDER BY
                sanpham.MASP ASC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                                <td>
                                        <?php echo $row['MASP'] ?>
                                </td>
                                <td>
                                        <?php echo $row['TENSP'] ?>
                                </td>
                                <td>
                                <?php echo $row['DONGIA'] ?>
                                </td>
                                <td>
                                <?php echo $row['SOLUONG'] ?>
                                </td>
                                <td>
                                <?php echo $row['TENLOAISP'] ?>
                                </td>
                                <td>
                                <?php echo $row['TENTHUONGHIEU'] ?>
                                </td>

                                <td>
                                        <a href="./Edit.php">
                                                <img src="../../Images/edit.png" alt="Edit" class="icon" width="30px">
                                        </a>
                                        <a href="./Detail.php" >
                                                <img src="../../Images/details.png" alt="Detail" class="icon" width="30px">
                                        </a>
                                        <a href="./Delete.php">
                                                <img src="../../Images/delete.png" alt="Delete" class="icon" width="30px">
                                        </a>
                                </td>
                        </tr>

                        <?php
                }

                ?>
        </table>
</div>
<?php
include("../shared/footer.php");
?>