<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm năm âm lịch</title>
</head>
<body>
    <style>

    </style>
    <?php 
        $solar = 0;
        $lunar = $img = "";
        $cans = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
        $chis = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tị", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
        $imgs = array("hoi","ty","suu","dan","meo","thin","ran","ngo","mui","than","dau","tuat");

        if (isset($_POST['submit']))
        {
            if (isset($_POST['solar']) && $_POST['solar'] != 0)
            {
                $solar = $_POST['solar'];
                $temp = $solar - 3;
                $can = $temp % 10;
                $chi = $temp % 12;
    
                $lunar = "$cans[$can] $chis[$chi]";
                $img = $imgs[$chi];
            }
        }

    ?>

    <form action="" method="post">
        <table>
            <tr style="background-color: red;"><td colspan="3" align="center"><h3>Tính năm âm lịch</h3></td></tr>
            <tr>
                <td align="center">Năm dương lịch</td>
                <td></td>
                <td align="center">Năm âm lịch</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="solar" value="<?php echo $solar;?>">
                </td>
                <td style="width: 80px;" align="center"><input type="submit" value="=>" name="submit"></td>
                <td>
                    <input type="text" name="lunar" value="<?php echo $lunar;?>">
                </td>
            </tr>
            <tr><td colspan="3" align="center"><img src="./images/<?php echo $img; ?>.jpg" alt=""></td></tr>
        </table>
    </form>
</body>
</html>