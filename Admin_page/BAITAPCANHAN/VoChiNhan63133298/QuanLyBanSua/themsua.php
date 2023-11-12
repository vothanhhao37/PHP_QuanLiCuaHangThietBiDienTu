<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        img {
            width: 100%;
        }

        span {
            color: red;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <?php
    require("connect.php");
    if (isset($_POST["masua"])) {
        $masua = $_POST["masua"];
    } else
        $masua = "";

    if (isset($_POST["tensua"])) {
        $tensua = $_POST["tensua"];
    } else
        $tensua = "";

    if (isset($_POST["hangsua"])) {
        $hangsua = $_POST["hangsua"];
    } else
        $hangsua = "";

    if (isset($_POST["loaisua"])) {
        $loaisua = $_POST["loaisua"];
    } else
        $loaisua = "";

    if (isset($_POST["trongluong"])) {
        $trongluong = $_POST["trongluong"];
    } else
        $trongluong = "";

    if (isset($_POST["dongia"])) {
        $dongia = $_POST["dongia"];
    } else
        $dongia = "";

    if (isset($_POST["dinhduong"])) {
        $dinhduong = $_POST["dinhduong"];
    } else
        $dinhduong = "";

    if (isset($_POST["loiich"])) {
        $loiich = $_POST["loiich"];
    } else
        $loiich = "";

    if (isset($_FILES['hinhanh']['tmp_name'])) {
        $file = $_FILES['hinhanh'];
        $hinhanh = $file['name'];
        $fileTmpPath = $file['tmp_name'];
        $hinhanhError = $file['error'];
        $targetDir = './Hinh_sua/';
        $targetPath = $targetDir . $hinhanh;
        copy($fileTmpPath, $targetPath);
    } else
        $hinhanh = "";
    ?>


    <div class="container">
        <form enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <th colspan="2" align="center">THÊM SỮA MỚI</th>
                </tr>
                <tr>
                    <td>Mã sữa: </td>
                    <td><input type="text" name="masua" value="<?php echo $masua; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên sữa: </td>
                    <td><input type="text" name="tensua" value="<?php echo $tensua; ?>"></td>
                </tr>
                <tr>
                    <td>Hãng sữa: </td>
                    <td>
                        <select name="hangsua">
                            <?php
                            $sql1 = "SELECT Ma_hang_sua,Ten_hang_sua FROM hang_sua";
                            $result1 = mysqli_query($conn, $sql1);
                            while ($row = mysqli_fetch_array($result1)) {
                                $checked = isset($_POST["hangsua"]) && $_POST["hangsua"] == $row[0] ? "selected" : "";
                                echo "<option value='$row[0]' $checked> " . $row[1] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Loại sữa: </td>
                    <td>
                        <select name="loaisua">
                            <?php
                            $sql2 = "SELECT Ma_loai_sua,Ten_loai FROM loai_sua";
                            $result2 = mysqli_query($conn, $sql2);
                            while ($row = mysqli_fetch_array($result2)) {
                                $checked = isset($_POST["loaisua"]) && $_POST["loaisua"] == $row[0] ? "selected" : "";
                                echo "<option value='$row[0]' $checked> " . $row[1] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Trọng lượng: </td>
                    <td><input type="text" name="trongluong" value="<?php echo $trongluong; ?>">(gr hoặc ml)</td>
                </tr>
                <tr>
                    <td>Đơn giá: </td>
                    <td><input type="text" name="dongia" value="<?php echo $dongia; ?>">(VND)</td>
                </tr>
                <tr>
                    <td>Thành phần dinh dưỡng:</td>
                    <td>
                        <textarea name="dinhduong" id="" cols="30" rows="5"><?php echo $dinhduong; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Lợi ích:</td>
                    <td>
                        <textarea name="loiich" id="" cols="30" rows="5"><?php echo $loiich; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
                    <td><input type="file" name="hinhanh"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Thêm mới" name="submit"></td>
                </tr>
            </table>
        </form>
        <div>
        <!-- Kết quả thêm mới -->
        <?php

        if (isset($_POST["submit"])) {
            $inputs = array($masua, $tensua, $hangsua, $loaisua, $trongluong, $dongia, $dinhduong, $loiich, $hinhanh);
            $filtered = array_filter($inputs, function (string $str) {
                return $str == "";
            });
            if (empty($filtered)) {
                $sql_masua = "SELECT Ma_sua FROM sua;";
                $masuaResult = mysqli_query($conn, $sql_masua);
                $check = true;
                while ($index = mysqli_fetch_array($masuaResult, MYSQLI_NUM)) {
                    if ($masua == $index[0])
                        $check = false;
                }
                if ($check) {
                    $trongluong = (int) $trongluong;
                    $dongia = (int) $dongia;
                    $addQuery = "INSERT INTO sua (Ma_sua,Ten_sua,Ma_hang_sua,Ma_loai_sua,Trong_luong,Don_gia,TP_Dinh_Duong,Loi_ich,Hinh)
                                                VALUES ('$masua','$tensua','$hangsua','$loaisua','$trongluong','$dongia','$dinhduong','$loiich','$hinhanh')";

                    mysqli_query($conn, $addQuery);
                    echo "<h2>Thêm mới thành công</h2>";
                    
                    $query = "Select sua.*, Ten_hang_sua from Sua,hang_sua WHERE sua.ma_hang_sua=hang_sua.ma_hang_sua AND sua.Ma_sua = '$masua'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    require("suaitem.php");
                } else
                    echo "<span> Mã sữa đã tồn tại </span>";
            } else
                echo "<span> Không được để trống trường nào. </span>";
        }
        ?>
        </div>
    </div>
</body>

</html>