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
    define('PI', 3.1416);
    if (isset($_POST['a']))
        $a = trim($_POST['a']);
    else
        $a = "";
    if (isset($_POST['b']))
        $b = trim($_POST['b']);
    else
        $b = "";
    switch ($a) {
        case 1: // chu vi, diện hình vuông
            echo "hình vuông";
            $cv = $b * 4;
            $dt = $b * $b;
            break;
        case 2: // chu vi, diện hình tròn có bán kính là b
            echo "hình tròn";
            $cv = $b * 2 * 3.14;
            $dt = $b * $b * 3.14;
            break;
        case 3: // chu vi, diện hình tam giác có bán kính là b
            echo "hình tam giác";
            $cv = $b * 3;
            $dt = ($b * $b) * (sqrt(3) / 4);
            break;
        case 4: // chu vi, diện hình chữ nhật 
            echo "hình chữ nhật";
            $cv = ($a + $b) * 2;
            $dt = $a * $b;
            break;
        default:
            echo "không tính được";
            break;
    }
    ?>
    <form align='center' action="" method="post">
        <table>
            <thead>
                <th colspan="2" align="center">
                    <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
                </th>
            </thead>
            <tr>
                <td>Nhập a: </td>
                <td><input type="text" name="a" value="<?php echo $a; ?> " /></td>
            </tr>
            <tr>
                <td>Nhập b:</td>
                <td><input type="text" name="b" value="<?php echo $b; ?> " /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td><input type="text" name="dientich" disabled="disabled" value="<?php echo $dt; ?> " /></td>
            </tr>
            <tr>
                <td>Chu Vi</td>
                <td><input type="text" name="dientich" disabled="disabled" value="<?php echo $cv; ?> " /></td>
            </tr>

        </table>
    </form>
</body>

</html>