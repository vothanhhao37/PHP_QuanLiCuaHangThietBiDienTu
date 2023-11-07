<?php
include("../shared/header.php");
?>
<?php
$rowsPerPage = 5; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
if(isset($_POST['makh'])) {
        $sql = "SELECT MAKH, TENKH, DIACHI, SDT, CMND FROM khachhang ORDER BY MAKH LIMIT $offset , $rowsPerPage";
}
else if(isset($_POST['tenkh'])) {
        $sql = "SELECT MAKH, TENKH, DIACHI, SDT, CMND FROM khachhang ORDER BY TENKH LIMIT $offset , $rowsPerPage";
}
else if(isset($_POST['diachi'])) {
        $sql = "SELECT MAKH, TENKH, DIACHI, SDT, CMND FROM khachhang ORDER BY DIACHI LIMIT $offset , $rowsPerPage";
}
else
$sql = "SELECT MAKH, TENKH, DIACHI, SDT, CMND FROM khachhang LIMIT $offset , $rowsPerPage";
$result = mysqli_query($conn, $sql);

?>

<div class="container">
        <h2 style="text-align:center">Danh sách khách hàng</h2>

        <a href="./Create.php" class="btn btn-primary m-2">Tạo mới</a>
        <table class="table">
                <form action="" method="post">
                <tr>
                        <th>
                               <input name="makh" type="submit" value="Mã khách hàng" style="border: none; background: none; font-weight: bold;">
                        </th>
                        
                        <th>
                        <input name="tenkh" type="submit" value="Tên khách hàng" style="border: none; background: none; font-weight: bold;">
                        </th>
                        <th>
                        <input name="diachi" type="submit" value="Địa chỉ" style="border: none; background: none; font-weight: bold;">
                        </th>
                        <th>
                                Số điện thoại
                        </th>

                        <th>
                                CMND
                        </th>

                        <th></th>
                </tr>
                </form>

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
                                <td width="120px">
                                        <a href="./Edit.php?id=<?php echo $row[0] ?>"><img src="../../Images/edit.png" alt="Edit"
                                                        class="icon" width="30"></a>
                                        <a href="./Details.php?id=<?php echo $row[0] ?>"><img src="../../Images/details.png"
                                                        alt="detail" class="icon" width="30"></a>
                                        <a href="./Delete.php?id=<?php echo $row[0] ?>"><img src="../../Images/delete.png"
                                                        alt="delete" class="icon" width="30"></a>
                                </td>
                        </tr>
                        <?php
                }
                ?>
        </table>
        <div style="display: flex; width: 100%;">
            <?php
            $re = mysqli_query($conn, 'select * from khachhang');
            $numRows = mysqli_num_rows($re);
            // gắn thêm nút back
            if ($_GET['page'] > 1)
                echo "<a class='btn btn-primary' href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Back</a> ";
            else
                echo "<button class='btn btn-default' disabled>Back</button>";
            //Trang đầu
            echo "<a class=' btn btn-primary' href="
                . $_SERVER['PHP_SELF'] . "?page=" . "1" . ">Trang đầu" . "</a> ";
            //tổng số trang
            $maxPage = ($numRows % $rowsPerPage) ? floor($numRows / $rowsPerPage) + 1 : floor($numRows / $rowsPerPage);
            $delta = 3; // số lượng trang hiển thị 2 bên
            echo "<div style = 'display: flex ; justify-content: center; align-items: center; flex-grow: 1;'>";
            if ($maxPage < 10) {
                for ($i = 1; $i <= $maxPage; $i++) //tạo link tương ứng tới các trang
                {
                    if ($i == $_GET['page'])
                        echo '<b class="btn btn-default" >Trang ' . $i . '</b> '; //trang hiện tại
                    else
                        echo "<a class=' btn btn-primary' href="
                            . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
                }
            } else {
                for ($i = $_GET['page'] - $delta; $i <= $_GET['page'] + $delta; $i++) //tạo link tương ứng tới các trang
                {
                    if ($i == $_GET['page'])
                        echo '<b class="btn btn-default w-40" >Trang ' . $i . '</b> '; //trang hiện tại
                    else if ($i > 0 && $i <= $maxPage)
                        echo "<a class=' btn btn-primary w-40' href="
                            . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
                }
            }
            echo "</div>";
            // Trang cuối
            echo "<a class=' btn btn-primary' href="
                . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . ">Trang cuối" . "</a> ";
            //gắn thêm nút Next
            if ($_GET['page'] < $maxPage)
                echo "<a class='btn btn-primary' href=" . $_SERVER['PHP_SELF'] . "?page="
                    . ($_GET['page'] + 1) . ">Next</a>";
            else
                echo "<button class='btn btn-default' disabled>Next</button>";
            ?>
        </div>

</div>
<?php
include("../shared/footer.php");
?>