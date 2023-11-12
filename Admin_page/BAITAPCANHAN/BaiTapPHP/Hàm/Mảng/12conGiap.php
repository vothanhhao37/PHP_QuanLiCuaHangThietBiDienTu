<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tim nam am lich</title>
    <style type="text/css">
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
    $mang_can = array("Canh", "Tân", "Nhâm", "Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ");
    $mang_chi = array("Thân", "Dậu", "Tuất", "Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi");
    $mang_hinh = array("than.jpg", "dau.jpg", "tuat.jpg", "hoi.jpg", "chuot.jpg", "suu.jpg", "dan.jpg", "meo.jpg", "thin.jpg", "ty.jpg", "ngo.jpg", "mui.jpg");

    if (isset($_POST['nam']))
        $nam = trim($_POST['nam']);
    else
        $nam = "";

    if (isset($_POST['tim'])) {
        $can = $mang_can[$nam % 10];
        $chi = $mang_chi[$nam % 12];
        $namAL = $can . " " . $chi;
        $hinh = "12ConGiap/" . $mang_hinh[$nam % 12];
    }

    ?>

    <form action="" method="post">
        <table border="0" cellpadding="0">
            <th colspan="3">
                <h2>TÌM NĂM ÂM LỊCH</h2>
            </th>
            <tr>
                <td align="center">Năm dương lịch </td>
                <td>
                <td align="center">Năm dương lịch </td>
            </tr>
            <tr>
                <td align="center"><input type="text" name="nam" size="20" value="<?php echo $nam; ?> " /></td>
                <td align="center"><input type="submit" name="tim" size="10" value="   =>   " /></td>
                <td align="center"><input type="text" name="namAL" size="20" disabled="true"
                        value="<?php echo $namAL; ?> " /></td>
            </tr>
            <tr>
                <td colspan="3" align="center"><img src="<?php echo $hinh; ?>"></td>
            </tr>

        </table>
    </form>

    <?php


    ?>

</body>

</html>