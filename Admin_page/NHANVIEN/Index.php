<?php
require("../shared/header.php");
require("../../db_connect.php");
require("../shared/function.php");
    ?>

<!-- Start body -->
<?php
if (isset($_GET['input'])) $input = $_GET['input'];
else $input = "";
if(isset($_POST["manv"])){
    $sql = "SELECT MANV, TENNV, DIACHI, SDT, EMAIL, CMND, CHUCVU, GIOITINH FROM nhanvien ORDER BY MANV;";    
}
else if(isset($_POST["tennv"])){
    $sql = "SELECT MANV, TENNV, DIACHI, SDT, EMAIL, CMND, CHUCVU, GIOITINH FROM nhanvien ORDER BY TENNV;";    
}
else if(isset($_POST["diachi"])){
    $sql = "SELECT MANV, TENNV, DIACHI, SDT, EMAIL, CMND, CHUCVU, GIOITINH FROM nhanvien ORDER BY DIACHI;";    
}
else
$sql = "SELECT MANV, TENNV, DIACHI, SDT, EMAIL, CMND, CHUCVU, GIOITINH FROM nhanvien;";
$result = mysqli_query($conn, $sql);
$rowsPerPage = 5; //số mẩu tin trên mỗi trang
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$list = mysqli_fetch_all($result,MYSQLI_NUM);

if ($input != "")
{
    $tempList = [];
    foreach($list as $key => $index)
    {
        $str = "";
        for ($i = 0; $i < count($index); $i++)
        {
            $str .= (string)$index[$i];
        }
        if (strpos($str,$input) !== false)
        {
            $tempList[] = $index;
        }
    }
    $list = $tempList;
}
?>
<style>
    html
    {
        font-size: 15px;
    }
</style>
<div class="container">
    <h2 style="text-align:center">DANH SÁCH NHÂN VIÊN</h2>
    <div class="d-flex justify-content-between">
        <a href="Create.php" class="btn btn-primary m-2">Tạo mới</a>
        <form action="" method="get">
            <input type="text" name="input" value="<?php echo $input; ?>" placeholder="Tìm kiếm">
            <input type="submit" value="Tìm" name="search" class="btn btn-primary">
        </form>
    </div>
    <?php include("../shared/alert.php"); ?>
    <table class="table">
    <form action="" method="post">
        <tr>
            <th>
            <input name="manv" type="submit" value="Mã nhân viên" style="border: none; background: none; font-weight: bold;">
            </th>
            <th>
            <input name="tennv" type="submit" value="Tên nhân viên" style="border: none; background: none; font-weight: bold;">
            </th>
            <th>
            <input name="diachi" type="submit" value="Địa chỉ" style="border: none; background: none; font-weight: bold;">
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
            <th>

            </th>
        </tr>
    </form>
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
                <td>
                    <?php echo $row[7] ?>
                </td>
                <td style="min-width: 120px;">
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
    <div style="display: flex; width: 100%;">
            <?php
            $numRows = count($list);
            // gắn thêm nút back
            if ($_GET['page'] > 1)
                echo "<a class='btn btn-primary' href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "&input=". $input . "'>Back</a> ";
            else
                echo "<button class='btn btn-default' disabled>Back</button>";
            //Trang đầu
            echo "<a class=' btn btn-primary' href='"
                . $_SERVER['PHP_SELF'] . "?page=" . "1" . "&input=". $input . "'>Trang đầu" . "</a> ";
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
                            . $_SERVER['PHP_SELF'] . "?page=" . $i . "&input=". $input . "'>" . $i . "</a> ";
                }
            } else {
                for ($i = $_GET['page'] - $delta; $i <= $_GET['page'] + $delta; $i++) //tạo link tương ứng tới các trang
                {
                    if ($i == $_GET['page'])
                        echo '<b class="btn btn-default w-40" >Trang ' . $i . '</b> '; //trang hiện tại
                    else if ($i > 0 && $i <= $maxPage)
                        echo "<a class=' btn btn-primary w-40' href='"
                            . $_SERVER['PHP_SELF'] . "?page=" . $i . "&input=". $input . "'>" . $i . "</a> ";
                }
            }
            echo "</div>";
            // Trang cuối
            echo "<a class=' btn btn-primary' href='"
                . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . "&input=". $input . "'>Trang cuối" . "</a> ";
            //gắn thêm nút Next
            if ($_GET['page'] < $maxPage)
                echo "<a class='btn btn-primary' href='" . $_SERVER['PHP_SELF'] . "?page="
                    . ($_GET['page'] + 1) . "&input=". $input . "'>Next</a>";
            else
                echo "<button class='btn btn-default' disabled>Next</button>";
            ?>
        </div>
</div>

<!-- End body -->

<?php
require("../shared/footer.php");
?>