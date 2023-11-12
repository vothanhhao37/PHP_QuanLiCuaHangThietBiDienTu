<html>

<head>
    <style type="text/css">
        body {
            background-color: #d24dff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            background: #ffd94d;
            border: 0 solid yellow;
        }

        thead {
            background: #fff14d;
        }

        td {
            color: blue;
        }

        h3 {
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>

<body>
    <?php
    $donGia = 20000;
    if (isset($_POST['tenChuHo']))
        $tenChuHo = trim($_POST['tenChuHo']);
    else
        $tenChuHo = "";
    if (isset($_POST['csc']))
        $csc = trim($_POST['csc']);
    else
        $csc = "";
    if (isset($_POST['csm']))
        $csm = trim($_POST['csm']);
    else
        $csm = "";
    if (isset($_POST['tinh']))
        if ($csc > $csm)
            echo "chỉ số nhập vào ko hợp lệ";
        else
            $thanhToan = ($csm - $csc) * $donGia;
    ?>
    <form align='center' action="" method="post">
        <table>
            <thead>
                <th colspan="2" align="center">
                    <h3>Thanh Toán Tiền Điện</h3>
                </th>
            </thead>
            <tr>
                <td>Tên chủ hộ</td>
                <td><input type="text" name="tenChuHo" value="<?php echo $tenChuHo ?>"></td>
            </tr>
            <tr>
                <td>Chỉ số cũ</td>
                <td><input type="text" name="csc" value="<?php echo $csc ?>"></td>
            </tr>
            <tr>
                <td>Chỉ số mới</td>
                <td><input type="text" name="csm" value="<?php echo $csm ?>"></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" name="donGia" value="<?php echo $donGia ?>"></td>
            </tr>
            <tr>
                <td>Số tiền thanh toán</td>
                <td><input type="text" name="tienPhaiTra" disabled="disable" value="<?php echo $thanhToan; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
</body>

</html>