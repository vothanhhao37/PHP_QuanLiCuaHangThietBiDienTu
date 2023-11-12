<html>

<head>
    <link rel="stylesheet" href="./">
</head>

<body>
    <style>

    </style>
</body>

</html>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
$sql = "SELECT Ma_sua, Ten_sua, Hinh, Trong_luong, Don_gia, Ten_hang_sua, Ten_loai FROM sua, hang_sua, loai_sua WHERE Sua.Ma_hang_sua = hang_sua.Ma_hang_sua AND sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
$result = mysqli_query($conn, $sql);
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
if (mysqli_num_rows($result) <> 0) {
    $stt = 1;
    echo "<tr style = background-color:  'red';></tr>";
    while ($rows = mysqli_fetch_row($result)) {

        echo "<tr>";
        echo "<td style= 'display: flex; justify-content: center; align-items: center'><image src = 'Hinh_sua/$rows[2]'></td>";
        echo "<td><p style = 'font-weight: bold'>$rows[1]<br></p> 
                $rows[6] - $rows[3] gr - $rows[4] vnd <br>
        </td>";
        echo "</tr>";


    }
}
?>