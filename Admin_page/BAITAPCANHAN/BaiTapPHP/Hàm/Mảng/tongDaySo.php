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
    function tongdayso($dayso)
    {
        $tong = 0;
        foreach ($dayso as $i => $val) {
            $tong += $val;
        }
        return $tong;
    }
    if (isset($_POST['dayso'])) {
        $dayso = trim($_POST['dayso']);
    } else
        $dayso = "  ";
    $array = explode(",", $dayso);
    if (isset($_POST['tong'])) {
        $ketqua = tongdayso($array);
    }



    ?>
    <form action="" method="post">
        <table order="0" cellpadding="0">
            <th colspan="2">
                <h2>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h2>
            </th>
            <tr>
                <td>Nhập dãy số</td>
                <td><input type="text" name="dayso" value="<?php echo $dayso ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tong" value="Tổng dẫy số"></td>
            </tr>
            <tr>
                <td>Tổng dãy số</td>
                <td><input type="text" name="ketqua" disabled="disable" value="<?php echo $ketqua ?>"></td>
            </tr>
        </table>
    </form>
</body>

</html>