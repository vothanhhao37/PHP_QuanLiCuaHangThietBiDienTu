<?php
include("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
?>



<div class="pl-4 pt-4 pb">
        <h1 style="text-align:center">Tính toán số sản phẩm bán được theo loại</h1>

        <div style="display:flex;justify-content:center">
                <form action="" method="post" class="form-inline" autocomplete="off">
                        <div class="form-group">
                                <label for="startDate" class="mr-2">Ngày bắt đầu:</label>
                                <div class="input-group">
                                        <div class="datepicker-container">
                                                <input id="ngayBatDau" name="ngayBatDau" type="date"
                                                        class="form-control datepicker" autocomplete="off"
                                                        required="required"
                                                        value="<?php echo (isset($_POST['ngayBatDau'])) ? $_POST['ngayBatDau'] : "" ?>">
                                        </div>
                                </div>
                        </div>
                        <div class="form-group ml-4">
                                <label for="endDate" class="mr-2">Ngày kết thúc:</label>
                                <div class="input-group">
                                        <div class="datepicker-container">
                                                <input id="ngayKetThuc" name="ngayKetThuc" type="date"
                                                        class="form-control datepicker" autocomplete="off"
                                                        required="required"
                                                        value="<?php echo (isset($_POST['ngayKetThuc'])) ? $_POST['ngayKetThuc'] : "" ?>">
                                        </div>
                                </div>
                        </div>
                        <div class="form-group">
                                <?php
                                $sql_sp = "SELECT MALOAISP, TENLOAISP FROM loaisanpham";
                                $result_sp = mysqli_query($conn, $sql_sp);
                                ?>
                                <label for="loaiSanPham" class="mr-2">Loại sản phẩm:</label>
                                <select id="loaisp" name="loaisp" class="form-control">
                                        <option value="">-- Chọn loại sản phẩm --</option>
                                        <?php
                                        while ($row_sp = mysqli_fetch_assoc($result_sp)) {
                                                ?>
                                                <option value="<?php echo $row_sp['MALOAISP'] ?>">
                                                        <?php echo $row_sp['TENLOAISP'] ?>
                                                </option>
                                                <?php
                                        }
                                        ?>
                                </select>
                        </div>

                        <button type="submit" class="btn btn-primary ml-4" name="tinhtoan">Tính toán</button>
                </form>

        </div>

        <?php
        if (isset($_POST['tinhtoan'])) {
                $sql_tt = "SELECT loaisanpham.TENLOAISP, SUM(chitiethoadon.SOLUONG) FROM ((hoadon JOIN chitiethoadon ON
                hoadon.MAHOADON = chitiethoadon.MAHOADON) JOIN sanpham on chitiethoadon.MASP = sanpham.MASP) JOIN
                loaisanpham on sanpham.MALOAISP = loaisanpham.MALOAISP
                WHERE (sanpham.MALOAISP = '" . $_POST["loaisp"] . "') AND (NGAYTAO <= '" . $_POST['ngayKetThuc'] . "') AND (NGAYTAO >= '" . $_POST['ngayBatDau'] . "')";
                $result_tt = mysqli_query($conn, $sql_tt);
                $row = mysqli_fetch_row($result_tt);
                ?>
                <table class="table table-striped mt-2">
                <thead>
                        <tr>
                                <th>Loại sản phẩm</th>
                                <th>Số lượng bán được</th>
                        </tr>
                </thead>
                <tbody>
                        <?php
                        
                        ?>
                        <tr>
                                <td><?php echo $row[0] ?></td>
                                <td><?php echo $row[1] ?></td>
                        </tr>

                        <?php
                        ?>


                </tbody>
        </table>

                <?php
        }
        ?>

</div>
<?php
include("../shared/footer.php");
?>