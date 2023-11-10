<title>Tìm năm nhuận</title>
<body>
    <style>
        input[type=submit] {
            width: 50%;
        }

        table {
            background-color: antiquewhite;
        }

        label {}
    </style>
    <?php
    $input = 0;
    $res = "Hãy nhập vào số nguyên dương";

    if (isset($_POST['submit'])) {
        if (isset($_POST['input'])) {
            $input = (int) $_POST['input'];
            if ($input > 0) {
                $res = "";

                foreach (range(2000, $input) as $year) {
                    if (nam_nhuan($year))
                        $res .= " $year ";
                }

                if (!$res) 
                {
                    $res = "Không có năm nhuận nào.";
                }
                {
                    $res .= " là năm nhuận";
                }
            }
        }
    }

    function nam_nhuan($nam): int
    {
        if ($nam % 400 == 0 || ($nam % 4 == 0 && $nam % 100 != 0))
            return 1;
        return 0;
    }

    ?>

    <form action="" method="post">
        <table>
            <tr style="background-color: red;">
                <td colspan="2" align="center">Tìm năm nhuận</td>
            </tr>
            <tr>
                <td align="center">Năm: </td>
                <td><input type="number" name="input" value="<?php echo $input ?>"></td>
            </tr>
            <tr style="background-color: green;">
                <td colspan="2" align="center"><label for="">
                        <?php echo $res ?>
                    </label></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tìm năm nhuận" name="submit"></td>
            </tr>

        </table>
    </form>
</body>