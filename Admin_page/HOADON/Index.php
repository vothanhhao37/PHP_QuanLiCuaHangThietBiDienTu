
<?php
include("../shared/header.php");
?>
<?php
$sql = "SELECT MAHOADON, NGAYTAO, TINHTRANGDONHANG, khachhang.TENKH, nhanvien.TENNV, khachhang.MAKH FROM ((hoadon JOIN khachhang ON hoadon.MAKH = khachhang.MAKH) JOIN nhanvien ON hoadon.MANV = nhanvien.MANV)";
$result = mysqli_query($conn, $sql);
?>
<div class="container">
    <h2 style="text-align:center">Danh sách hóa đơn</h2>

    <a href="Create.php" class="btn btn-primary m-2">Tạo mới</a>
    <?php include("../shared/alert.php"); ?>
    <table class="table">
        <tr>
            <th>Mã hóa đơn</th>
            <th>
                Ngày tạo
            </th>
            <th>
                Tình trạng đơn hàng
            </th>
            <th>
                Tên khách hàng
            </th>
            <th>
                Tên nhân viên
            </th>
            <th>
                Mã khách hàng
            </th>
        </tr>
        <?php
        while ($row = mysqli_fetch_row($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $row[0] ?>
                </td>
                <td>
                    <?php echo $row[1] ?>
                </td>
                <td>
                    <?php echo $row[2] ?>
                </td>
                <td>
                    <?php echo $row[3] ?>
                </td>
                <td>
                    <?php echo $row[4] ?>
                </td>
                <td>
                    <?php echo $row[5] ?>
                </td>
                <td width="120px">
                    <a href="./Edit.php?id=<?php echo $row[0]?>"><img src="../../Images/edit.png" alt="Edit" class="icon" width="30"></a>
                    <a href="./Details.php?id=<?php echo $row[0]?>"><img src="../../Images/details.png" alt="detail" class="icon" width="30"></a>
                    <a href="./Delete.php?id=<?php echo $row[0]?>"><img src="../../Images/delete.png" alt="delete" class="icon" width="30"></a>
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