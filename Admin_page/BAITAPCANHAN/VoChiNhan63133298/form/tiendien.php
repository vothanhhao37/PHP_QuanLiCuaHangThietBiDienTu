<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            box-sizing: border-box;

        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {}

        td {
            padding: 10px 20px;
        }

        table {
            background-color: antiquewhite;
            border-radius: 10px;
        }

        p {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
        }
    </style>
    <?php

    $alert = "";
    $name = "";
    $old = 0;
    $new = 0;
    $price = 200000;
    $total = 0;

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if (isset($_POST['old'])) {
        $old = $_POST['old'];
    }

    if (isset($_POST['new'])) {
        $new = $_POST['new'];
    }

    if ($name === "")
        $alert = "Hãy nhập vào tên!";
    else if ($old != (int) $old || $new != (int) $new)
        $alert = "Số điện phải là số nguyên";
    else if ($old > $new)
        $alert = "Số điện mới không nhỏ hơn số điện cũ!";
    else if ($old < 0 || $new < 0)
        $alert = "Số điện phải lớn hơn hoặc bằng không!";
    else {
        $total = ($new - $old) * $price;
    }

    ?>
    <form action="" method="post">
        <table>
            <thead align="center">
                <tr>
                    <td colspan=3>
                        <h2>Thanh toán tiền điện</h2>
                    </td>
                </tr>
            </thead>
            <tr>
                <td>Tên chủ hộ: </td>
                <td><input type="text" name="name" value="<?php echo $name ?>"></td>
                <td class="donvi"></td>
            </tr>
            <tr>
                <td>Chỉ số cũ: </td>
                <td><input type="text" name="old" value="<?php echo $old ?>"></td>
                <td class="donvi">(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới: </td>
                <td><input type="text" name="new" value="<?php echo $new ?>"></td>
                <td class="donvi">(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input type="text" disabled name="price" value="<?php echo $price ?>"></td>
                <td class="donvi">(VND)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán: </td>
                <td><input type="text" disabled name="total" value="<?php echo $total ?>"></td>
                <td class="donvi">(VND)</td>
            </tr>
            <tr>
                <td align="center" colspan=3><input type="submit" class="btn" value="Tính toán"></td>
            </tr>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <p>
                            <?php echo $alert ?>
                        </p>
                    </td>
                </tr>
            </tfoot>

        </table>
    </form>
</body>

</html>