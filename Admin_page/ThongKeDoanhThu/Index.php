<?php
include("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
?>


<div class="pl-4 pt-4 pb">
        <h1 style="text-align:center">Thống kê doanh thu</h1>

        <div style="display:flex;justify-content:center">


                <form action="" method="post" class="form-inline" autocomplete="off">
                        <div class="form-group">
                                <label for="startDate" class="mr-2">Ngày bắt đầu:</label>
                                <label for=""></label>
                                <div class="input-group">
                                        <div class="datepicker-container">
                                                <input id="ngayBatDau"
                                                        value="<?php echo (isset($_POST['ngayBatDau'])) ? $_POST['ngayBatDau'] : "" ?>"
                                                        name="ngayBatDau" type="date" class="form-control datepicker"
                                                        autocomplete="off" required="required">
                                        </div>

                                </div>
                        </div>
                        <div class="form-group ml-4">
                                <label for="ngayKetThuc" class="mr-2">Ngày kết thúc:</label>
                                <div class="input-group">
                                        <div class="datepicker-container">
                                                <input id="ngayKetThuc"
                                                        value="<?php echo (isset($_POST['ngayKetThuc'])) ? $_POST['ngayKetThuc'] : "" ?>"
                                                        name="ngayKetThuc" type="date" class="form-control datepicker"
                                                        autocomplete="off" required="required">
                                        </div>

                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-4" name="loc">Lọc</button>
                </form>
        </div>

        <?php
        if (isset($_POST["loc"])) {
                $sql = "SELECT hoadon.MAHOADON, chitiethoadon.MASP, sanpham.TENSP, chitiethoadon.SOLUONG, 
                chitiethoadon.DONGIAXUAT FROM (hoadon join chitiethoadon on hoadon.MAHOADON = chitiethoadon.MAHOADON)
                JOIN sanpham ON chitiethoadon.MASP = sanpham.MASP WHERE 
                (NGAYTAO <= '" . $_POST['ngayKetThuc'] . "') AND (NGAYTAO >= '" . $_POST['ngayBatDau'] . "')";
                $result = mysqlI_query($conn, $sql);

                ?>
                <h3 class="mt-4">Danh sách chi tiết hóa đơn</h3>
                <table class="table table-striped mt-2">
                        <thead>
                                <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                $doanhThu = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                                <td>
                                                        <?php echo $row['MAHOADON'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $row['MASP'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $row['TENSP'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $row['SOLUONG'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $row['DONGIAXUAT'] ?>
                                                </td>
                                                <td>
                                                        <?php
                                                        $thanhTien = $row['DONGIAXUAT'] * $row['SOLUONG'];
                                                         echo $thanhTien;
                                                         $doanhThu+=$thanhTien
                                                         ?>
                                                </td>
                                        </tr>
                                        <?php
                                }
                                ?>


                        </tbody>
                </table>

                <h4 class="mt-4">Tổng doanh thu: <?php echo $doanhThu ?></h4>

                <a href="../HOME/index.php" class="btn btn-secondary">Quay về trang chủ</a>
                <a href="#" class="btn btn-success">In doanh thu</a>
                <?php
        }
        ?>
</div>
<?php
include("../shared/footer.php");
?>