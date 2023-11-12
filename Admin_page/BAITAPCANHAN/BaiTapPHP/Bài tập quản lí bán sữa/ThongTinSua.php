<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin sữa</title>
</head>

<body>
    <?php
    // Ket noi CSDL
//require("connect.php");
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());
    $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi, Dien_thoai, Email from khach_hang';
    $result = mysqli_query($conn, $sql);
    echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;
        echo "<tr style = background-color:  'red';></tr>";
        while ($rows = mysqli_fetch_row($result)) {
            $gioiTinh = null;
            if ($rows[2] == 1) {
                $gioiTinh = "Nữ";
            } else
                $gioiTinh = "Nam";
            echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$rows[0]</td>";
            echo "<td>$rows[1]</td>";
            echo "<td>$gioiTinh</td>";
            echo "<td>$rows[3]</td>";
            echo "<td>$rows[4]</td>";
            echo "<td>$rows[5]</td>";
            echo "</tr>";
            $stt += 1;
        }
    }
    echo "</table>";

    ?>

</body>

</html>