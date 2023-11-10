<style>
      th {
            font-weight: 2000;
            color: orange;
            font-size: 30px;
            padding: 10px
      }

      .product_infor {
            margin-left: 15px
      }
</style>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$rowsPerPage = 10; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page'])) {
      $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$result = mysqli_query($conn, "SELECT Hinh, Ten_sua, hang_sua.Ten_hang_sua,loai_sua.Ten_loai,Trong_luong,Don_gia
from sua join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT $offset , $rowsPerPage");


echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo "<tr><th colspan=2>THÔNG TIN CÁC SẢN PHẨM</th></tr>";
if (mysqli_num_rows($result) <> 0) {
      $stt = 1;
      while ($rows = mysqli_fetch_row($result)) {
            echo "<tr>";

            echo "<td align='center'><img style='border:0' src='../img/$rows[0]' width='100'></td>";
            echo "<td>
<div class='product_infor'>
<p style='font-weight:bold;'>$rows[1]<p/>
<p>Nhà sản xuất: $rows[2]</p>
<p>$rows[3] - $rows[4] - $rows[5]</p>
</div>
</td>";

            echo "</tr>";
            $stt += 1;
      } //while
}
echo "</table>";
$re = mysqli_query($conn, 'select Hinh,Ten_sua from sua');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows / $rowsPerPage) + 1;

//tạo link tương ứng tới các trang
echo "<p align='center'>";
if ($_GET['page'] > 1) {
      echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">&lt&lt&lt</a> ";

}

for ($i = 1; $i <= $maxPage; $i++) {
      if ($i == $_GET['page']) {
            echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
      } else
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
}
if ($_GET['page'] < $maxPage) {
      echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">&gt;&gt;&gt;</a>";
}
echo "</p>"
      ?>