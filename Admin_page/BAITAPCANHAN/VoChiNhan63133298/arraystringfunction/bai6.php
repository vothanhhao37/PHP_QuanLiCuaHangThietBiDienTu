<title>Tìm kiếm trong mảng</title>
<body>
    <style>
        input
        {
            width: 100%;
        }

        table
        {
            width: 600px; 
            background-color: gainsboro;  
        }

        input[type=submit]
        {
            background-color: aquamarine;
        }

        tr:first-child, tr:last-child
        {
            background-color: aqua;
        }

    </style>

    <?php 
        $alert = '(Các phần tử trong mảng sẽ ngăn cách nhau bằng dấu ",")';
        $input = $value = $res = $arr = "";

        if (isset($_POST['submit']))
        {
            $input = trim($_POST['input']);
            $value = trim($_POST['value']);
            if ($_POST['input'] != "" && $_POST['value'] != "")
            {
                $my_arr = explode(",", $input);
                
                $pos = find($my_arr, $value);

                $arr = implode(",  ", $my_arr);

                if ($pos >= 0)
                {
                    $res = "Tìm thấy $value tại vị trí thứ $pos của mảng";
                } else $res = "Không tìm thấy $value trong mảng";

            } else $alert = "Không được bỏ trống dòng nào!";
        }

        function find(array $arr, int $value) : int
        {
            for($i = 0; $i < count($arr); $i++)
            {
                if ($arr[$i] == $value) return $i;
            }
            return -1;
        }
    ?>

    <form action="" method="post">
        <table>
            <tr><td colspan="2" align="center"><h2>Tìm kiếm</h2></td></tr>
            <tr>
                <td>Nhập mảng: </td>
                <td><input type="text" name="input" value="<?php echo $input ?>"></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm kiếm: </td>
                <td><input type="text" name="value" value="<?php echo $value ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tìm kiếm" name="submit"></td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input type="text" value="<?php echo $arr ?>" disabled></td>
            </tr>   
            <tr>
                <td>Kết quả cần tìm kiếm: </td>
                <td><input type="text" value="<?php echo $res ?>" disabled></td>
            </tr>
            <tr><td colspan="2" align="center"><?php echo $alert; ?></td></tr>
        </table>
    </form>
</body>