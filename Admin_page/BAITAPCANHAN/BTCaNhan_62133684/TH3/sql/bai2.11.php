<?php
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Lấy dữ liệu từ form
    $tenSua = $_POST["ten_sua"];
    $maHangSua = $_POST["ma_hang_sua"];
    $maLoaiSua = $_POST["ma_loai_sua"];
    $trongLuong = $_POST["trong_luong"];
    $donGia = $_POST["don_gia"];
    $tpDinhDuong = $_POST["tp_dinh_duong"];
    $loiIch = $_POST["loi_ich"];
    $hinhAnh = $_FILES["hinh_anh"]["name"];
    
    // Sinh mã sữa tự động
    $query = "SELECT MAX(Ma_sua) AS maxMaSua FROM sua";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $maxMaSua = $row["maxMaSua"];
    $newMaSua = generateNewMaSua($maxMaSua);

    // Upload hình ảnh
    $targetDirectory = "/img";
    $targetFile = $targetDirectory . basename($hinhAnh);
    move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $targetFile);
 
    // Thêm bản ghi mới vào bảng sua
    $query = "INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh) 
              VALUES ('$newMaSua', '$tenSua', '$maHangSua', '$maLoaiSua', '$trongLuong', '$donGia', '$tpDinhDuong', '$loiIch', '$hinhAnh')";
    mysqli_query($conn, $query);
    //messange thông báo
    $message = "Thêm sản phẩm thành công";
 

}

// Hàm sinh mã sữa mới
function generateNewMaSua($maxMaSua)
{
    $prefix = "MILK";
    $suffix = str_pad((intval(substr($maxMaSua, 4)) + 1), 5, '0', STR_PAD_LEFT);
    return $prefix . $suffix;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thêm sản phẩm sữa</title>
    <style>
        body {
            display: flex;
            justify-content: center;
        }

        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 80%;
            padding: 5px;
        }

        input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <th colspan="2">
                    <h2>Thêm sản phẩm sữa</h2>
                </th>
            </tr>
            <tr>
                <th>Mã sữa </th>
                <td><input type="text" name="ma_sua" required value="<?php
                $query = "SELECT MAX(Ma_sua) AS maxMaSua FROM sua";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $maxMaSua = $row["maxMaSua"];
                $newMaSua = generateNewMaSua($maxMaSua);
                echo "". $maxMaSua ."";
                ?>" disabled></td>
            </tr> 
            <tr>
                <th>Tên sữa:</th>
                <td><input type="text" name="ten_sua" required></td>
            </tr>
            <tr>
                <th>Hãng sữa:</th>
                <td>
                    <select name="ma_hang_sua" required>
                        <?php
                        $query = "SELECT Ma_hang_sua, Ten_hang_sua FROM hang_sua";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['Ma_hang_sua'] . "'>" . $row['Ten_hang_sua'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Loại sữa:</th>
                <td>
                    <select name="ma_loai_sua" required>
                        <?php
                        $query = "SELECT Ma_loai_sua, Ten_loai FROM loai_sua";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['Ma_loai_sua'] . "'>" . $row['Ten_loai'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Trọng lượng:</th>
                <td><input type="number" name="trong_luong" required></td>
            </tr>
            <tr>
                <th>Đơn giá:</th>
                <td><input type="number" name="don_gia" required></td>
            </tr>
            <tr>
                <th>Thành phần dinh dưỡng:</th>
                <td><textarea name="tp_dinh_duong" required></textarea></td>
            </tr>
            <tr>
                <th>Lợi ích:</th>
                <td><textarea name="loi_ich" required></textarea></td>
            </tr>
            <tr>
                <th>Hình ảnh:</th>
                <td><input type="file" name="hinh_anh" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="submit" value="Thêm sản phẩm">
                </td>
            </tr>
            <?php
            // Hiển thị thông tin sản phẩm vừa thêm
            if (!empty($message)) {
               echo "<tr><td colspan=2>$message</td></tr>";
               echo "<tr><th colspan=2>$tenSua- $maHangSua</th></tr>";
               echo "<tr>";
       
               echo "<td align='center'><img style='border:0' src='/img/$hinhAnh' width='100'></td>";
               echo "<td>
               <b style='display:block'><i>Thành phần dinh dưỡng</i></b>
               <p>$tpDinhDuong</p>
               <b style='display:block'><i>Lợi ích</i></b>
               <p>$loiIch</p>
               <p align=''><b><i>Trọng lượng: </i></b><span style='color:red'>$trongLuong</span> - 
               <b><i>Đơn giá: </i></b><span style='color:red'>$donGia VND</span></p>
           </td>";
               echo "</tr>";
            }
            ?>
        </table>
       
    </form>
   
</body>

</html>