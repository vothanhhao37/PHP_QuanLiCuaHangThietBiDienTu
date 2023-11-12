<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        table {
            color: #ffff00;
            background-color: lightblue;
        }

        table th {
            background-color: blue;
            font-style: vni-times;
            color: yellow;
        }
    </style>
</head>

<body>
    <?php
    function namNhuan($nam)
    {
        if ($nam % 400 || ($nam % 4 == 0 && $nam % 100 != 0)) {
            return 1;
        } else
            return 0;
    }
    if (isset($_POST['nam'])) {
        $nam = $_POST['nam'];
    } else
        $nam = 0;

    $nhuan = array();
    foreach (range($nam, 2000) as $year) {
        if (namNhuan($year) == 1) {
            array_push($nhuan, $year);
        }
    }
    $kq = "";
    if (is_null($nhuan)) {
        $kq = "không có năm nhuận";


    } else {
        $str = implode(" ", $nhuan);
        $kq = $str . " là năm nhuận ";
    }
    ?>

    <form action="" method="post">
        <table border="0" cellpadding="0">
            <th colspan="2">
                <h>Tìm năm nhuận</h2>
            </th>
            <tr>
                <td>Năm:</td>
                <td><input type="text" name="nam" value="<?php echo $nam; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <textarea name="" cols="20" rows="5"><?php echo $kq; ?>

                </textarea>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="tim" value="Tìm năm nhuận"></td>
            </tr>

        </table>
    </form>

</body>

</html>