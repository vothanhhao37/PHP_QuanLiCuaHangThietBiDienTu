<?php
include("../shared/header.php");
?>
<?php
if (isset($_POST['matskt'])) {
        $sql = "SELECT MATSKT, HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN FROM thongsokythuat ORDER BY MATSKT ";
} else if (isset($_POST['ram'])) {
        $sql = "SELECT MATSKT, HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN FROM thongsokythuat ORDER BY RAM  ";
}else if (isset($_POST['manhinh'])) {
        $sql = "SELECT MATSKT, HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN FROM thongsokythuat ORDER BY KICHCOMANHINH ";
} else if (isset($_POST['pin'])) {
        $sql = "SELECT MATSKT, HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN FROM thongsokythuat ORDER BY PIN ";
} else
        $sql = "SELECT MATSKT, HEDIEUHANH, RAM, ROM, KICHCOMANHINH, VIXULY, PIN FROM thongsokythuat  ";
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
        <h2 style="text-align:center">Danh sách thông số kỹ thuật</h2>
        <a href="./Create.php" class="btn btn-primary m-2">Tạo mới</a>
        <table class="table">
                <form action="" method="post">
                        <tr>
                                <th>
                                        <input name="matskt" type="submit" value="Mã thông số kỹ thuật"
                                                style="border: none; background: none; font-weight: bold;">
                                </th>
                                <th>
                                        Hệ điểu hành
                                </th>
                                <th>
                                        <input name="ram" type="submit" value="RAM"
                                                style="border: none; background: none; font-weight: bold;">
                                </th>
                                <th>
                                        ROM
                                </th>
                                <th>
                                        <input name="manhinh" type="submit" value="Kích cỡ màn hình"
                                                style="border: none; background: none; font-weight: bold;">
                                </th>
                                <th>
                                        Vi xử lý
                                </th>
                                <th>
                                        <input name="pin" type="submit" value="PIN"
                                                style="border: none; background: none; font-weight: bold;">
                                </th>
                </form>
                <th></th>
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
                                <td>
                                        <?php echo $row[6] ?>
                                </td>

                                <td width="120px">
                                        <a href="./Edit.php?id=<?php echo $row[0] ?>"><img src="../../Images/edit.png"
                                                        alt="Edit" class="icon" width="30"></a>
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
            $re = mysqli_query($conn, 'select * from thongsokythuat');
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