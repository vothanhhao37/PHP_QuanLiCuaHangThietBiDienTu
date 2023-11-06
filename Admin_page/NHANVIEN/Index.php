<?php
require("../shared/header.php")
    ?>
<!-- Start body -->
<?php
$sql = "SELECT MANV, TENNV, DIACHI, SDT, EMAIL, CMND, CHUCVU, GIOITINH FROM nhanvien;";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <h2 style="text-align:center">DANH SÁCH NHÂN VIÊN</h2>

    <a href="Create.php" class="btn btn-primary m-2">Thêm nhân viên</a>
    <?php include("../shared/alert.php"); ?>
    <table class="table">
        <tr>
            <th>
                Mã nhân viên
            </th>
            <th>
                Tên nhân viên
            </th>
            <th>
                Địa chỉ
            </th>
            <th>
                Số điện thoại
            </th>
            <th>
                Email
            </th>
            <th>
                CMND
            </th>

            <th>
                Chức vụ
            </th>
            <th>
                Giới tính
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
                <td>
                    <?php echo $row[6] ?>
                </td>
                <td>
                    <?php echo $row[7] ?>
                </td>
                <td width="120px">
                    <a href="./Edit.php?id=<?php echo $row[0] ?>"><img src="../../Images/edit.png" alt="Edit" class="icon"
                            width="30"></a>
                    <a href="./Details.php?id=<?php echo $row[0] ?>"><img src="../../Images/details.png" alt="detail"
                            class="icon" width="30"></a>
                    <a href="./Delete.php?id=<?php echo $row[0] ?>"><img src="../../Images/delete.png" alt="delete"
                            class="icon" width="30"></a>
                </td>
            </tr>
            <?php
        }
        ?>


    </table>

</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>