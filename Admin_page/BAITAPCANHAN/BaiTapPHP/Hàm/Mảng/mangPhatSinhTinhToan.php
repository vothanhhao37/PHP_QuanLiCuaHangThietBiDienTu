<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    if (isset($_POST['soPT'])) {
        $soPT = $_POST['soPT'];
    } else
        $soPT = "";

    if (isset($_POST['mang'])) {
        $mang = $_POST['mang'];
    } else
        $mang = "";

    if (isset($_POST['GTLN'])) {
        $gtln = $_POST['GTLN'];
    } else
        $gtln = "";
    if (isset($_POST['GTNN'])) {
        $gtnn = $_POST['GTNN'];
    } else
        $gtnn = "";
    if (isset($_POST['tong'])) {
        $tong = $_POST['tong'];
    } else
        $tong = "";

    if (isset($_POST['tinhtoan'])) {
        $array = taomang($soPT);
        $mang = xuatMang($array);
        $gtln = timMax($array);
        $gtnn = timMin($array);
        $tong = tinhTong($array);
    }
    function taomang($arr)
    {
        $a = array();
        for ($i = 0; $i < $arr; $i++) {
            $a[$i] = rand(0, 20);
        }
        return $a;
    }
    function xuatMang($arr)
    {
        $kq = implode(" ", $arr);
        return $kq;
    }
    function tinhTong($arr)
    {
        $tong = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $tong += $arr[$i];
        }
        return $tong;
    }
    function timMin($arr)
    {
        $min = $arr[0];
        for ($i = 0; $i < count($arr); $i++) {
            if ($min > $arr[$i]) {
                $min = $arr[$i];
            }
        }
        return $min;
    }

    function timMax($arr)
    {
        $max = $arr[0];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] > $max) {
                $max = $arr[$i];
            }
        }
        return $max;
    }


    ?>
    <form action="" method="post">
        <table order="0" cellpadding="0">
            <th colspan="2">
                <h2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2>
            </th>
            <tr>
                <td>Nhập số phần tử</td>
                <td><input type="text" name="soPT" value="<?php echo $soPT ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tinhtoan" value="Phát sinh và tính toán"></td>
            </tr>
            <tr>
                <td>MẢNG</td>
                <td><input type="text" name="mang" value="<?php echo $mang ?>"></td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng: </td>
                <td><input type="text" name="GTLN" disabled="disable" value="<?php echo $gtln ?>"></td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng:</td>
                <td><input type="text" name="GTNN" disabled="disable" value="<?php echo $gtnn ?>"></td>
            </tr>
            <tr>
                <td>Tổng mảng: </td>
                <td><input type="text" name="tong" disabled="disable" value="<?php echo $tong ?>"></td>
            </tr>
        </table>
    </form>
</body>

</html>