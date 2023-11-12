<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>



    <?php
    include('xlInputthemsua.php');

    /////Start xu li SQL///////
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
    $sql = "SELECT Hinh,TP_Dinh_Duong,Loi_ich,Trong_luong,Don_gia FROM sua";
    $result = mysqli_query($conn, $sql);
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
    $querySql = "SELECT * FROM sua";
    $query = mysqli_query($conn, $querySql);
    if (isset($_POST['them'])) {
        $id = $_POST['masua'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $tenSua = $_POST['tensua'];
        $loaiSua = $_POST['loaisua'];
        $hangSua = $_POST['hangsua'];
        $trongLuong = $_POST['trongluong'];
        $donGia = $_POST['dongia'];
        $thanhPhanDinhDuong = $_POST['tpdd'];
        $loiIch = $_POST['loiich'];
        $sql = "INSERT INTO sua
        VALUES ('$id', '$tenSua' ,  '$hangSua', '$loaiSua', '$trongLuong', '$donGia', '$thanhPhanDinhDuong', '$loiIch',' $image')";
        $result = mysqli_query($conn, $sql);
    }

    /////End xu li SQL///////
    
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th colspan="2" align="center">
                    <h3>THÊM SỮA MỚI</h3>
                </th>
            </thead>
            <tr>
                <td>Mã sữa: </td>
                <td><input type="text" name="masua" value="<?php echo $id; ?>"></td>
            </tr>
            <tr>
                <td>Tên sữa: </td>
                <td><input type="text" name="tensua" value="<?php echo $tenSua; ?>"></td>
            </tr>
            <tr>
                <td>Loại sữa: </td>
                <td>
                   <select name="loaisua" id="loaisua">
                        <?php
                        $query = "SELECT Ma_loai_sua, Ten_loai FROM loai_sua";
                        $reult = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) <> 0) {
                            while ($rows = mysqli_fetch_array($result)) {
                                echo "<option value=" . $rows["Ma_loai_sua"] . ">" . $rows["Ten_loai"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hãng sữa</td>
                <td>
                    <select name="hangsua" id="hangsua">
                        <?php
                        $query = "SELECT Ma_hang_sua, Ten_hang_sua FROM hang_sua";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) <> 0) {
                            while ($rows = mysqli_fetch_array($result)) {
                                echo "<option value=" . $rows["Ma_hang_sua"] . ">" . $rows["Ten_hang_sua"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trọng lượng: </td>
                <td><input type="text" name="trongluong" value="<?php echo $trongLuong; ?>">(gr hoặc ml)</td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input type="text" name="dongia" value="<?php echo $donGia; ?>">(VND)</td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng: </td>
                <td>
                    <textarea name="tpdd" id="thanhPhanDinhDuong" cols="70" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>Lợi ích: </td>
                <td>
                    <textarea name="loiich" id="loiIch" cols="70" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh: </td>
                <td>
                    <input type="file" name="image" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="them" value="    Thêm mới        "></td>
            </tr>
        </table>

    </form>

</body>

</html>