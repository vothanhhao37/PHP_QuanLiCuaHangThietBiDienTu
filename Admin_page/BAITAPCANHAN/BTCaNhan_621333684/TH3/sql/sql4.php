

<html>
    <head>
      <title>SQL 4</title>
    </head>
<style>
    p{
        text-align: center;
    }
    th {
        font-weight: 2000;
        color: orange;
        font-size: 30px;
        padding: 10px;
    }

    .product_infor {
        margin-left: 15px;
    }

    .product_list {
        display: flex;
        flex-wrap: wrap;
    }

    .product_item {
        width: 300px;
        
        border: 1px solid #ccc;
        padding: 10px;
    }

    .product_image {
        text-align: center;
    }

    .product_image img {
        width:50%;
        height: auto;
    }

    .product_details {
        margin-top: 10px;
    }
    h1{
        padding:20px;
        background-color:orange;
    }
    .pagination {
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 2px;
        background-color: #f5f5f5;
        color: #333;
        text-decoration: none;
        border-radius: 3px;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination b {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 2px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
    }
</style>
<h1 align='center'><b >THÔNG TIN CÁC SẢN PHẨM</b></h1>
</html>
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
$result = mysqli_query($conn, "SELECT *
from sua join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT $offset , $rowsPerPage");
if (mysqli_num_rows($result) <> 0) {
    $stt = 1;

    echo "<div class='product_list'>"; // Bắt đầu danh sách cột

    while ($rows = mysqli_fetch_assoc($result)) {
        
        echo "<div class='product_item'>"; // Bắt đầu một mục sản phẩm

        echo "<div class='product_image'>";
        echo "<img src='../img/{$rows['Hinh']}'>";
        echo "</div>";
        echo "<div class='product_details'>";
        echo "<a href='sql4_product_detail.php?id={$rows['Ma_sua']}'><p style='font-weight:bold;'>{$rows['Ten_sua']}</p></a>";
        echo "<p>Nhà sản xuất: {$rows['Ten_hang_sua']}</p>";
        echo "<p>{$rows['Trong_luong']} - {$rows['Don_gia']}</p>";
        echo "</div>";

        echo "</div>"; // Kết thúc một mục sản phẩm

        $stt += 1;
    }
    echo "</div>"; // Kết thúc danh sách cột
}
$re = mysqli_query($conn, 'select Hinh,Ten_sua from sua');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows / $rowsPerPage) + 1;

//tạo link tương ứng tới các trang
echo "<p class='pagination'>";
if ($_GET['page'] > 1) {
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Previous</a>";
}

for ($i = 1; $i <= $maxPage; $i++) {
    if ($i == $_GET['page']) {
        echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
    } else
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
}
if ($_GET['page'] <  $maxPage) {
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";
}
echo "</p>";
?>