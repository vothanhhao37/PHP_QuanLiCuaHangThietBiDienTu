<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tim kiem sua</title>

</head>

<body>

    <style>
        .body
        {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        td
        {
            border: 1px solid black;
            text-align: center;
        }

        table
        {
            width: 800px;
            margin-top: 20px;
        }
    </style>
    <form action="" method="get">

        <table bgcolor="#eeeeee" align="center" width="70%" border="1" cellpadding="5" cellspacing="5"
            style="border-collapse: collapse;">
            <tr>
                <td align="center">
                    <font color="blue">
                        <h3>TÌM KIẾM THÔNG TIN KHÁCH HÀNG</h3>
                    </font>
                </td>
            </tr>
            <tr>
                <td align="center">Mã khách hàng<input type="text" name="makhachhang" size="30"
                        value="<?php if (isset($_GET['makhachhang']))
                            echo $_GET['makhachhang']; ?>">
                    <input type="submit" name="tim" value="Tìm kiếm">
                </td>
            </tr>

        </table>

    </form>

    <?php
    echo "<div class='body'>";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (empty($_GET['makhachhang']))
            echo "<p align='center'>Vui lòng nhập tên sản phẩm</p>";
        else {

            $makh = $_GET['makhachhang'];

            require('connect.php');

            $query = "SELECT hoa_don.So_hoa_don, hoa_don.Ngay_HD, hoa_don.Tri_gia  FROM khach_hang, hoa_don WHERE khach_hang.Ma_khach_hang = hoa_don.Ma_khach_hang AND khach_hang.Ma_khach_hang = '$makh'";

            $result = mysqli_query($conn, $query);

            $kh = "SELECT Ma_khach_hang, Ten_khach_hang, Email, Dia_chi FROM khach_hang WHERE khach_hang.Ma_khach_hang = '$makh'";
            $row = mysqli_fetch_assoc(mysqli_query($conn,$kh));
            if (mysqli_num_rows($result) <> 0) {
                echo "<table>
                <tr><td colspan='2'>Thông tin khách hàng:</td></tr>
                <tr>
                    <td>Mã khách hàng:  {$row['Ma_khach_hang']}</td>
                    <td>Họ tên khách hàng: {$row['Ten_khach_hang']}</td>
                </tr>
                <tr>
                    <td>Email : {$row['Email']}</td>
                    <td>Số địa chỉ: {$row['Dia_chi']}</td>
                </tr>
                </table>";
                echo "<table>
                <tr>
                    <th>STT</th>
                    <th>Mã HD</th>
                    <th>Ngày mua hàng</th>
                    <th>Trị giá</th>
                    <th>Xem</th>";
                    $stt = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $stt++;
                    echo "    <tr>    
                    <td>$stt</td>
                    <td>{$row['So_hoa_don']}</td>
                    <td>{$row['Ngay_HD']}</td>
                    <td>{$row['Tri_gia']}</td>
                    <td><a href='#'>Xem</a></td></tr>";
                }
                echo "</tr></table>";
            } else
                echo "<div><b>Không tìm thấy thông tin khách hàng này.</b></div>";
        }
    }
    echo "</div>"
    ?>
</body>

</html>


