<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thao tác trên mảng</title>
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
    if (isset($_POST['n'])) {
        $n = $_POST['n'];
    } else {
        $n = 0;
    }

    if (isset($_POST['array'])) {
        $array = $_POST['array'];
    } else {
        $array = 0;
    }
    ?>

    <!-- Xử lí -->
    <?php
    function hienThiMang($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            echo "$arr[$i] ";
        }
    }
    function demSoChan($arr)
    {
        $dem = 0;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] % 2 == 0) {
                $dem++;
            }
        }
        return $dem;
    }

    function demNho100($arr)
    {
        $dem = 0;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] < 100) {
                $dem++;
            }
        }
        return $dem;
    }

    function tongSoAm($arr)
    {
        $tong = 0;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] < 0)
                $tong += $arr[$i];
        }
        return $tong;
    }

    function soCuoi($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $socuoi = $arr[$i] / 10;
        }
        return $socuoi;
    }
    function keCuoi($arr)
    {
        $temp = array();
        for ($i = 0; $i < count($arr); $i++) {
            if (abs($arr[$i]) > 10) {
                $soCuoi = $arr[$i] / 10;
                $soKeCuoi = $soCuoi % 10;
                if ($soKeCuoi == 0)
                    $temp[] = $i + 1;
            }
        }
        hienThiMang($temp);
    }

    function sapXepTangDan($arr)
    {
        $temp = 0;
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = 0; $j < count($arr) - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }

        }
        hienThiMang($arr);
    }
    ?>
    <form action="" method="post">
        <table border="0" cellpadding="0">
            <th colspan="2">
                <h2>Một số thao tác trên mảng</h2>
            </th>
            <tr>
                <td>Nhập n:</td>
                <td><input type="text" name="n" size="70" value="<?php echo $n; ?> " /></td>

            </tr>

            <tr>
                <td></td>
                <td colspan="2" align=" center"><input type="submit" name="tinh" size="20" value="   Xử lí  " /></td>
            </tr>

            <tr>
                <td>Các phần tử trong mảng </td>
                <td colspan=2>
                    <textarea name="" id="" cols="40" rows="20"><?php
                    echo "Mảng được hiển thị là: ";
                    $a = array();
                    for ($i = 0; $i < $n; $i++) {
                        $a[$i] = rand(-1000, 1000);
                    }
                    hienThiMang($a);
                    echo "\nSố lượng các phần tử chẵn trong mảng: " . demSoChan($a);
                    echo "\nSố lượng phần tử nhỏ hơn 100: " . demNho100($a);
                    echo "\nTổng các phần tử trong mảng có giá trị âm là: " . tongSoAm($a);
                    echo "\nIn ra vị trí của các thành phần trong mảng có chữ số kề cuối là 0 là : ";
                    echo KeCuoi($a);
                    echo "\nThứ tự tăng dần của mảng là: ";
                    sapXepTangDan($a);
                    ?>
                
                    </textarea>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>