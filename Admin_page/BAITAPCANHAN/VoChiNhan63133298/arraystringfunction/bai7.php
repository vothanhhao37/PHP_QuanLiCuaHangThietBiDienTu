<title>
    Thay thế phần tử trong mảng
</title>

<body>
    <?php 
        $input = $arr = $new_arr = "";
        $value = $replace = 0;

        if (isset($_POST['input']))
        {
            $input = trim($_POST['input']);
        }

        if (isset($_POST['value']))
        {
            $value = trim($_POST['value']);
        }
        if (isset($_POST['replace']))
        {
            $replace = trim($_POST['replace']);
        }

        if (isset($_POST['submit']))
        {
            $my_arr = explode(",", $input);
            $arr = implode(" ", $my_arr);
            $new_arr = implode(" ", replace_arr($my_arr, $value, $replace));
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
            <tr style="background-color: green;"><td colspan= 2 align=center><h2>Thay thế phần tử trong mảng</h2></td></tr>
            <tr>
                <td class="colored-col">Nhập các phần tử: </td>
                <td class="colored-col"><input type="text" value="<?php echo $input ?>" name="input"></td>
            </tr>
            <tr>
                <td class="colored-col">Giá trị cần thay thế: </td>
                <td class="colored-col"><input type="text" value="<?php echo $value ?>" name="value"></td>
            </tr>
            <tr>
                <td class="colored-col">Giá trị thay thế: </td>
                <td class="colored-col"><input type="text" value="<?php echo $replace?>" name="replace"></td>
            </tr>
            <tr>
                <td class="colored-col"></td>
                <td class="colored-col"><span><input type="submit" name="submit" value="Thay thế"><span></td>
            </tr>
            <tr>
                <td>Mảng cũ: </td>
                <td><input type="text" value="<?php echo $arr ?>" disabled></td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế: </td>
                <td><input type="text" value="<?php echo $new_arr; ?>" disabled></td>
            </tr>
            <tr><td colspan=2 align=center>(<span>Ghi chú: </span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td></tr>
        </table>
    </form>
</body>