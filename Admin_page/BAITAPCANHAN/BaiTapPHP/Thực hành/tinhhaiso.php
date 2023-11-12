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

    <form align="center" action="xltinhHaiSo.php" method="post">
        <table>
            <thead>
                <td colspan="2" align="center">
                    <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
                </td>
            </thead>
            <tr>
                <td>Chọn phép tính</td>
                <td>
                    <input type="radio" name="radGT" value="Cong" <?php if (isset($_POST['radGT']) && $_POST['radGT'] == 'Cong')
                        echo 'checked="checked"'; ?> checked /> Cộng
                    <input type="radio" name="radGT" value="Tru" <?php if (isset($_POST['radGT']) && $_POST['radGT'] == 'Tru')
                        echo 'checked="checked"'; ?> checked />Trừ
                    <input type="radio" name="radGT" value="Nhan" <?php if (isset($_POST['radGT']) && $_POST['radGT'] == 'Nhan')
                        echo 'checked="checked"'; ?> checked />Nhân
                    <input type="radio" name="radGT" value="Chia" <?php if (isset($_POST['radGT']) && $_POST['radGT'] == 'Chia')
                        echo 'checked="checked"'; ?> checked />Chia
                </td>


            </tr>
            <tr>
                <td>Số thứ nhất</td>
                <td><input type="text" name="s1" value="<?php echo $s1; ?>"></td>
            </tr>
            <tr>
                <td>Số thứ hai</td>
                <td><input type="text" name="s2" value="<?php echo $s2; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
</body>

</html>