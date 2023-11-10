<title>
    Đếm phần tử ghép mảng và sắp xếp
</title>

<body>
    <?php 
        $A = $B = $C = $asc = $desc = "";
        $countA = $countB = 0;
        if (isset($_POST['A']))
        {
            $A = trim($_POST['A']);
        }

        if (isset($_POST['B']))
        {
            $B = trim($_POST['B']);
        }

        if (isset($_POST['submit']))
        {
            $a = explode(",", $A);
            $b = explode(",", $B);
            $countA = count($a);
            $countB = count($b);

            $c = array_merge($a, $b);
            $C = implode(", ", $c);
            $asC = $c;
            $desC = $c;
            sort($asC);
            rsort($desC);
            $asc = implode(", ", $asC);
            $desc = implode(", ", $desC);
        }
        // generate a $len elements array with random indexes value from 0 to 20
        
        function replace_arr(array $arr, int $old, int $new) : array
        {
            foreach ($arr as &$index)
            {
                $index = $index == $old ? $new : $index;
            }
            return $arr;
        }
    ?>
    <style>
        span
        {
            color: red;
        }

        table
        {
            background-color: pink;
            width: 500px;
        }

        input
        {
            width: 100%;
        }

        .colored-col
        {
            background-color: palevioletred;
        }

    </style>
    <form action="" method="post">
        <table>
            <tr style="background-color: green;"><td colspan= 2 align=center><h2>Đếm phần tử, ghép mảng và sắp xếp</h2></td></tr>
            <tr>
                <td class="colored-col">Mảng A: </td>
                <td class="colored-col"><input type="text" value="<?php echo $A ?>" name="A"></td>
            </tr>
            <tr>
                <td class="colored-col">Mảng B: </td>
                <td class="colored-col"><input type="text" value="<?php echo $B ?>" name="B"></td>
            </tr>
            <tr>
                <td class="colored-col"></td>
                <td class="colored-col"><span><input type="submit" name="submit" value="Thực hiện"><span></td>
            </tr>

            <tr>
                <td>Số phần tử mảng A: </td>
                <td><input type="text" value="<?php echo $countA ?>" disabled></td>
            </tr>
            <tr>
                <td>Số phần tử mảng B: </td>
                <td><input type="text" value="<?php echo $countB; ?>" disabled></td>
            </tr>
            <tr>
                <td>Mảng C:  </td>
                <td><input type="text" value="<?php echo $C; ?>" disabled></td>
            </tr>
            <tr>
                <td>Mảng C tăng dần: </td>
                <td><input type="text" value="<?php echo $asc; ?>" disabled></td>
            </tr>
            <tr>
                <td>Mảng C giảm dần: </td>
                <td><input type="text" value="<?php echo $desc; ?>" disabled></td>
            </tr>
            <tr><td colspan=2 align=center>(<span>Ghi chú: </span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td></tr>
        </table>
    </form>
</body>