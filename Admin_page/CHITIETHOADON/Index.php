<?php
require("../shared/header.php")
?>
<!-- Start body -->
<?php
$sql = "SELECT * FROM chitiethoadon";
$result = mysqli_query($conn, $sql);
?>
<div class="container">

    
    <h2 style="text-align:center"> Danh sách chi tiết hóa đơn</h2>
    
    <a href="./Create.php" class="btn btn-primary m-2">Tạo mới</a>
    
        <?php include("../shared/alert.php"); ?>
    <table class="table">
        <tr>
            <th>
                Mã hóa đơn
            </th>
            <th>
               Mã sản phẩm
            </th>
            <th>
               Số lượng
            </th>
            <th>
              Đơn giá xuất
            </th>
            <th></th>
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
                <td width="120px">
                    <a href="./Edit.php?id=<?php echo $row[0]."-".$row[1]?>"><img src="../../Images/edit.png" alt="Edit" class="icon" width="30"></a>
                    <a href="./Details.php?id=<?php echo $row[0]."-".$row[1]?>"><img src="../../Images/details.png" alt="detail" class="icon" width="30"></a>
                    <a href="./Delete.php?id=<?php echo $row[0]."-".$row[1]?>"><img src="../../Images/delete.png" alt="delete" class="icon" width="30"></a>
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