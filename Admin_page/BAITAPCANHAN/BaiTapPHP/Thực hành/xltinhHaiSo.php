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
    $radPT = $_POST['radGT'];
    if (isset($_POST['s1'])) {
        $s1 = trim($_POST['s1']);
    } else
        $s1 = "";
    if (isset($_POST['s2'])) {
        $s2 = trim($_POST['s2']);
    } else
        $s2 = "";
    if ($radPT == "Cong")
        $kq = $s1 + $s2;
    if ($radPT == "Tru")
        $kq = $s1 - $s2;
    if ($radPT == "Nhan")
        $kq = $s1 * $s2;
    if ($radPT == "Chia")
        $kq = $s1 / $s2;
    ?>
    <form align="center" action="xltinhHaiSo.php" method="post">
        <table>
            <thead>
                <td colspan="2" align="center">
                    <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
                </td>
            </thead>
            <tr>
                <td class="chonPT">Chọn phép tính</td>
                <td>
                    <?php
                    if ($radPT == 'Cong')
                        echo "Cộng";
                    if ($radPT == 'Tru')
                        echo "Trừ";
                    if ($radPT == 'Nhan')
                        echo "Nhân";
                    if ($radPT == 'Chia')
                        echo "Chia"; ?>
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
                <td>Kết quả</td>
                <td><input type="text" name="ketQua" disabled="disable" value="<?php echo $kq; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <?php echo "<a href=\"javascript:window.history.back(-1);\">Tro ve trang truoc</a>"; ?>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>