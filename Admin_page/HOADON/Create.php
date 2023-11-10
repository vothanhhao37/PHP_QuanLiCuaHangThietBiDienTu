<?php
include("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
?>
<?php
$sql = "SELECT MAHOADON from hoadon ORDER BY MAHOADON DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$maHoaDon = (int) substr($row['MAHOADON'], 2);
$maHoaDon = $maHoaDon + 1;
$maHoaDon = "HD" . str_pad($maHoaDon, 4, "0", STR_PAD_LEFT);


if (isset($_POST["taomoi"])) {
    $sql = "INSERT INTO HOADON VALUES ('$maHoaDon', '" . $_POST['maNV'] . "', '" . $_POST['maKH'] . "', 
'" . $_POST['ngaytaohoadon'] . "', '" . $_POST['tinhtrang'] . "')";
    $result = mysqli_query($conn, $sql);
    toPage("./Index.php","Thêm hóa đơn thành công!","alert alert-success");
}

?>

<div class="container">
    <h2 style="text-align:center">Lập hóa đơn</h2>

    <form action="" method="POST">
        <div class="form-horizontal">
            <a class="btn btn-primary" href="Index.php">Trở về trang danh sách</a>
            <div class="form-group">
                <label>Mã hóa đơn </label>
                <input type="text" class="form-control ml-2" readonly value="<?php echo $maHoaDon ?>" name="MAHP" style="width:82%">
            </div>

            <?php
            $sql = "SELECT MANV from NHANVIEN ";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
                <label>Mã nhân viên</label>
                <div class="col-md-10">
                    <select name="maNV" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[0]</option>";
                        } ?>

                    </select>


                </div>
            </div>

            <?php
            $sql = "SELECT MAKH from KHACHHANG ";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
                <label>Mã khách hàng</label>
                <div class="col-md-10">
                    <select name="maKH" id="" class="form-control">
                        <?php while ($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[0]</option>";
                        } ?>

                    </select>


                </div>
            </div>

            <div class="form-group">
                <label>Ngày tạo hóa đơn</label>
                <div class="col-md-10">
                    <input type="date" class="form-control" name="ngaytaohoadon">
                </div>
            </div>

            <div class="form-group">
                <label>Tình trạng đơn hàng</label>
                <div class="col-md-10">
                    <select name="tinhtrang" id="" class="form-control">
                        <option value="Hẹn ngày giao">Hẹn ngày giao</option>
                        <option value="Đang giao hàng">Đang giao hàng</option>
                        <option value="Giao hàng thành công">Giao hàng thành công</option>
                        <option value="Giao hàng thất bại">Giao hàng thất bại</option>
                        <option value="Chờ xác nhận">Chờ xác nhận</option>
                        <option value="Đã đặt hàng">Đã đặt hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Tạo mới hóa đơn" class="btn btn-success" name="taomoi" />
                </div>
            </div>
    </form>
</div>

<div>
</div>

</div>