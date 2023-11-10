<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $res = 0;
    $pheptinh = "";
    $op = "";
    $num1 = 0;
    $num2 = 0;
    $back = "Trở về trang trước.";

    if (isset($_POST['op']))
        $op = $_POST['op'];
    
    if (isset($_POST['num1']))
    {
        $num1 = $_POST['num1'];
    }
    if (isset($_POST['num2']))
    {
        $num2 = $_POST['num2'];
    }
    if (is_numeric($num1) && is_numeric($num2))
    {
        if ($op == "Mul")
        {
            echo 100;
            $res = $num1 * $num2;
            $pheptinh = "Nhân";
        } else if ($op == "Plus")
        {
            $res = $num1 + $num2;
            $pheptinh = "Cộng";
        } else if ($op == "Diff")
        {
            $res = $num1 - $num2;
            $pheptinh = "Trừ";
        } else if ($op == "Div")
        {
            $res = (float)$num1 / $num2;
            $pheptinh = "Chia";
        }
    }
    else $back = "Không phải 2 số nên không tính được! Trở về trang trước";
    
    ?>

<form action="" method="post">
        <table>
            <thead>Phép tính trên 2 số</thead>
            <tbody>
                <tr>
                    <td>Chọn phép tính: </td>
                    <td> <?php echo $pheptinh ?>
                    </td>
                    </tr>
                    <tr>
                        <td>Số thứ nhất: </td>
                        <td>
                            <input type="text" name="num1" value="<?php echo $num1 ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Số thứ hai: </td>

                        <td><input type="text" name="num2" value="<?php echo $num2 ?>"></td>
                    </tr>
                    <tr>
                        <td>Kết quả là: </td>

                        <td><input type="text" name="res" value="<?php echo $res ?>"></td>
                    </tr>

                    <tr><td colspan = 2><a href="javascript:window.history.back(-1);"><?php echo $back ?></a></td></tr>
                </tbody>
            </table>
        </form>
</body>
</html>