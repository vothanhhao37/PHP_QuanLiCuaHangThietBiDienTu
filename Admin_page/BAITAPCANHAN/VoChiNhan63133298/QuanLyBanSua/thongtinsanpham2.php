<body>
    <style>
        body
        {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        table,td,tr
        {
            font-size: 12px;
            border: solid 1px black;
            text-align: center;
        }

        th
        {
            font-size: 30px;
        }
    </style>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua') 
    or die('Could not connect to MySQL: ' . mysqli_connect_error());


    $sql = "SELECT sua.ten_sua, sua.Hinh, sua.Trong_luong, sua.Don_gia, hang_sua.Ten_hang_sua, loai_sua.Ten_loai FROM sua,hang_sua,loai_sua where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua;";

    $result = mysqli_query($conn, $sql);


    $colnum = 5;
    echo "<table>";
    echo "<tr><th colspan='$colnum' align='center'> Thông tin các sản phẩm </th></tr>";
    $i = 0;
    echo "<tr>";
    while ($row = mysqli_fetch_row($result))
    {
        $i++;
        echo "<td><b>$row[0]</b> <br> Nhà sản xuất:$row[4] <br> <p>$row[5] - $row[2] gr - $row[3] VND</p><img src='./Hinh_sua/$row[1]' width=100px height=100px> </td>";    
        if ($i % $colnum == 0)
        {echo "</tr> <tr>";}
    }
    echo "</tr>";
    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($conn);
?>
</body>