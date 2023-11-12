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
            border: 0 solid black;
            display: display: flex;
            justify-content: center;
            align-items: center;

        }

        th{
            display:display: flex;
            justify-content: center;
            align-items: center;
        }

        td {
            color: blue;
        }

        h2 {
            font-family: verdana;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_POST['n'])) {
        $n = $_POST['n'];
    } else
        $n = "";

    if (isset($_POST['so'])) {
        $so = $_POST['so'];
    } else
        $so = "";

    if (isset($_POST['mang'])) {
        $mang = $_POST['mang'];
    } else
        $mang = "";

    if (isset($_POST['kq'])) {
        $kq = $_POST['kq'];
    } else
        $kq = "";


    function timKiem($arr, $soCanTim)
    {
        for ($i = 0; $i < count($arr); $i++) {
            if ($soCanTim == $arr[$i]) {
                return $i;
            }
        }

    }

    if (isset($_POST['timkiem'])) {
        $arr = explode(",", $n);
        $mang = $n;
        if (is_null(timKiem($arr, $so))) {
            $kq = "không tìm thấy";
        } else {
            $kq = "tìm thấy " . $so . " ở vị trí " . timKiem($arr, $so);
        }

    }
    ?>
    <form action="" method="post">
        <table order="0" cellpadding="0">
            <th>
                <h2>TÌM KIẾM</h2>
            </th>
            <tr>
                <td>Nhập mảng: </td>
                <td><input type="text" name="n" value="<?php echo $n ?>"></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm</td>
                <td><input type="text" name="so" value="<?php echo $so ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="timkiem" value="Tìm kiếm"></td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input type="text" name="mang" disabled="disabled" value="<?php echo $mang ?>"></td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm</td>
                <td><input type="text" name="kq" disabled="disabled" value="<?php echo $kq ?>"></td>
            </tr>
        </table>
    </form>
</body>

</html>