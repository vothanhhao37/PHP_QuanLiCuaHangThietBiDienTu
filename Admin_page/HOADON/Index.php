﻿<?php
include("../shared/header.php");
?>
<?php
<<<<<<< HEAD
$sql = "SELECT MAHOADON, NGAYTAO, TINHTRANGDONHANG, khachhang.TENKH, nhanvien.TENNV, khachhang.MAKH 
FROM ((hoadon JOIN khachhang ON hoadon.MAKH = khachhang.MAKH) JOIN nhanvien ON hoadon.MANV = nhanvien.MANV)";
=======
if (isset($_GET['input'])) $input = $_GET['input'];
else $input = "";
$sql = "SELECT MAHOADON, NGAYTAO, TINHTRANGDONHANG, khachhang.TENKH, nhanvien.TENNV, khachhang.MAKH FROM ((hoadon JOIN khachhang ON hoadon.MAKH = khachhang.MAKH) JOIN nhanvien ON hoadon.MANV = nhanvien.MANV) order by hoadon.mahoadon;";
>>>>>>> 72d6ae0c534f7f9e47e84eb5ae45b6f02fe9b88e
$result = mysqli_query($conn, $sql);
$rowsPerPage = 5; //số mẩu tin trên mỗi trang
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$list = mysqli_fetch_all($result, MYSQLI_NUM);

if ($input != "") {
    $tempList = [];
    foreach ($list as $key => $index) {
        $str = "";
        for ($i = 0; $i < count($index); $i++) {
            $str .= (string)$index[$i];
        }
        if (strpos($str, $input) !== false) {
            $tempList[] = $index;
        }
    }
    $list = $tempList;
}
?>

<div class="container">
    <h2 style="text-align:center">Danh sách hóa đơn</h2>
    <div class="d-flex justify-content-between">
        <a href="Create.php" class="btn btn-primary m-2">Tạo mới</a>
        <form action="" method="get">
            <input type="text" name="input" value="<?php echo $input; ?>" placeholder="Tìm kiếm">
            <input type="submit" value="Tìm" name="search" class="btn btn-primary">
        </form>
    </div>
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
        for ($i = 0; $i < $rowsPerPage; $i++) {
            if ($offset + $i == count($list)) break;
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
                    <a href="./Edit.php?id=<?php echo $row[0] ?>"><img src="../../Images/edit.png" alt="Edit" class="icon" width="30"></a>
                    <a href="./Details.php?id=<?php echo $row[0] ?>"><img src="../../Images/details.png" alt="detail" class="icon" width="30"></a>
                    <a href="./Delete.php?id=<?php echo $row[0] ?>"><img src="../../Images/delete.png" alt="delete" class="icon" width="30"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div style="display: flex; width: 100%;">
        <?php
        $numRows = count($list);
        // gắn thêm nút back
        if ($_GET['page'] > 1)
            echo "<a class='btn btn-primary' href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "&input=" . $input . "'>Back</a> ";
        else
            echo "<button class='btn btn-default' disabled>Back</button>";
        //Trang đầu
        echo "<a class=' btn btn-primary' href='"
            . $_SERVER['PHP_SELF'] . "?page=" . "1" . "&input=" . $input . "'>Trang đầu" . "</a> ";
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
                    echo "<a class=' btn btn-primary' href='"
                        . $_SERVER['PHP_SELF'] . "?page=" . $i . "&input=" . $input . "'>" . $i . "</a> ";
            }
        } else {
            for ($i = $_GET['page'] - $delta; $i <= $_GET['page'] + $delta; $i++) //tạo link tương ứng tới các trang
            {
                if ($i == $_GET['page'])
                    echo '<b class="btn btn-default w-40" >Trang ' . $i . '</b> '; //trang hiện tại
                else if ($i > 0 && $i <= $maxPage)
                    echo "<a class=' btn btn-primary w-40' href='"
                        . $_SERVER['PHP_SELF'] . "?page=" . $i . "&input=" . $input . "'>" . $i . "</a> ";
            }
        }
        echo "</div>";
        // Trang cuối
        echo "<a class=' btn btn-primary' href='"
            . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . "&input=" . $input . "'>Trang cuối" . "</a> ";
        //gắn thêm nút Next
        if ($_GET['page'] < $maxPage)
            echo "<a class='btn btn-primary' href='" . $_SERVER['PHP_SELF'] . "?page="
                . ($_GET['page'] + 1) . "&input=" . $input . "'>Next</a>";
        else
            echo "<button class='btn btn-default' disabled>Next</button>";
        ?>
    </div>

</div>
<?php
include("../shared/footer.php");
?>