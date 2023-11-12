<?php
session_start();
if (isset($_GET["tim_kiem"]))
    $string = $_GET["tim_kiem"];
if (!isset($string))
    $string = "";
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$rowsPerPage = 5; //số mẩu tin trên mỗi trang, giả sử là 5
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
$querry = "SELECT *
from sua join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua where Ten_sua like '%$string%'";
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$result = mysqli_query($conn, "$querry LIMIT $offset , $rowsPerPage");

?>
<html>

<head>
    <style>
        #tim_kiem_form {
            text-align: center
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
    .product_name{
        font-size: 40px;
        font-weight: bold;
        color:orange
    }
    </style>
</head>

<body>
    <form action="" method="get" id="tim_kiem_form">
        <h1>Tìm kiếm thông tin sữa</h1>
        <span>Tên sữa </span>
        <input type="text" name="tim_kiem">
        <input type="submit" value="Tìm kiếm" name="submit">


    </form>
    <?php
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    // Truy vấn để đếm số sản phẩm tìm kiếm được
    $total_count = mysqli_query($conn, $querry);
    $count = mysqli_num_rows($total_count);

    echo "<h2 style='text-align:center'>Kết quả tìm kiếm cho từ khóa: $string</h2>";
    echo "<p style='text-align:center'>Tổng số sản phẩm tìm thấy: $count</p>";
    if (mysqli_num_rows($result) <> 0) {

        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<tr><th class='product_name' colspan=2>{$rows['Ten_sua']} - {$rows['Ten_hang_sua']}</th></tr>";
            echo "<tr>";

            echo "<td align='center'><img style='border:0' src='../img/{$rows['Hinh']}' width='100'></td>";
            echo "<td>
           <b style='display:block'><i>Thành phần dinh dưỡng</i></b>
           <p>{$rows['TP_Dinh_Duong']}</p>
           <b style='display:block'><i>Lợi ích</i></b>
           <p>{$rows['Loi_ich']}</p>
           <p align=''><b><i>Trọng lượng: </i></b><span style='color:red'>{$rows['Trong_luong']}</span> - 
           <b><i>Đơn giá: </i></b><span style='color:red'>{$rows['Don_gia']} VND</span></p>
       </td>";
            echo "</tr>";

        } //while
    }
    echo "</table>";

    //tổng số mẩu tin cần hiển thị
    $numRows = mysqli_num_rows($total_count);
    //tổng số trang
    $maxPage = floor($numRows / $rowsPerPage) + 1;

    //tạo link tương ứng tới các trang
    // Tạo link tương ứng tới các trang
    echo "<p class='pagination'>";
    if ($_GET['page'] > 1) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "&tim_kiem=$string>Previous</a> ";
    }

    for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $_GET['page']) {
            echo '<b>' . $i . '</b> '; // Trang hiện tại sẽ được bôi đậm
        } else {
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "&tim_kiem=$string>" . $i . "</a> ";
        }
    }

    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "&tim_kiem=$string>Next</a>";
    }

    echo "</p>";
    ?>
</body>

</html>