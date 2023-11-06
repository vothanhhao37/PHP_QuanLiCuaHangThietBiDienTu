<?php
require("../shared/header.php")
    ?>
<!-- Start body -->

<?php
$sql = "SELECT MASP, TENSP, DONGIA, SOLUONG, loaisanpham.TENLOAISP , thuonghieu.TENTHUONGHIEU FROM sanpham, thuonghieu, loaisanpham WHERE sanpham.MATH = thuonghieu.MATH and loaisanpham.MALOAISP = sanpham.MALOAISP order by sanpham.masp;";
$result = mysqli_query($conn, $sql);
$rowsPerPage = 10; //số mẩu tin trên mỗi trang
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$list = mysqli_fetch_all($result,MYSQLI_NUM);
?>

<div class="container">
    <h2 style="text-align: center">DANH SÁCH SẢN PHẨM</h2>
    <a href="Create.php" class="btn btn-primary m-2">Thêm sản phẩm</a>
    <?php include("../shared/alert.php"); ?>
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
        </tr>
        <?php
        for ($i = 0; $i < $rowsPerPage; $i++){
            if ($offset+$i == count($list)) break;
            $row = $list[$offset + $i];
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
                    <a href="./Edit.php?id=<?php echo $row[0] ?>"><img src="../../Images/edit.png" alt="edit" class="icon" width="30"></a>
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
    <?php
    $re = mysqli_query($conn, 'select * from sanpham');
    $numRows = mysqli_num_rows($re);
    //tổng số trang
    $maxPage = floor($numRows / $rowsPerPage) + 1;
    echo "<div style = 'display: flex ; justify-content: center; align-items: center'>";
    // gắn thêm nút back
    if ($_GET['page'] > 1)
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Back</a> ";
    for ($i = 1; $i <= $maxPage; $i++) //tạo link tương ứng tới các trang
    {
        if ($i == $_GET['page'])
            echo '<b>Trang ' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
        else
            echo "<a href="
                . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang" . $i . "</a> ";
    }
    //gắn thêm nút Next
    if ($_GET['page'] < $maxPage)

        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page="
            . ($_GET['page'] + 1) . ">Next</a> </div>";
    ?>
</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>