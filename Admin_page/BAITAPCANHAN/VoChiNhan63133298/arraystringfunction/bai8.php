<title>Sắp xếp mảng</title>
<body>
    <?php
       $input = $asc = $desc = "";

       if (isset($_POST['input']))
       {
            $input = trim($_POST['input']);
       }

       if (isset($_POST['submit']))
       {
            $arr = explode(",", $input);
            $asc = implode(", ", sort_ascending($arr));
            $desc = implode(", ", sort_descending($arr));
       }

       function swap(&$a, &$b)
       {
            $temp = $a; 
            $a = $b;
            $b = $temp;
       }

       function sort_ascending(array $arr) : array
       {
            for($i = count($arr) - 1; $i > 0; $i--)
            {
                for ($j = 0; $j < $i; $j++)
                {
                    if ($arr[$j] > $arr[$j+1]) swap($arr[$j],$arr[$j+1]);
                }
            }    
            return $arr;
       }

       function sort_descending(array $arr) : array
       {
            for($i = count($arr) - 1; $i > 0; $i--)
            {
                for ($j = 0; $j < $i; $j++)
                {
                    if ($arr[$j] < $arr[$j+1]) swap($arr[$j],$arr[$j+1]);
                }
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
            width: 500px;
            background-color: aliceblue;
        }

        input[type=text]
        {
            width: 90%;
        }

    </style>
    <form action="" method="post">
        <table>
        <tr style="background-color: cyan;"><td align="center" colspan="2"><h2>Sắp xếp mảng</h2></td></tr>
        <tr>
            <td>Nhập mảng: </td>
            <td><input type="text" name="input" value="<?php echo $input ?>"><span>  (*)</span></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Sắp xếp tăng/giảm" name="submit"></td>
        </tr>
        <tr><td><span>Sau khi sắp xếp: </span></td><td></td></tr>
        <tr>
            <td>Tăng dần: </td>
            <td><input type="text" name="ascending" value="<?php echo $asc ?>" disabled></td>
        </tr>
        <tr>
            <td>Giảm dần: </td>
            <td><input type="text" name="descending" value="<?php echo $desc ?>" disabled></td>
        </tr>
        <tr><td colspan="2" align="center"><span>(*)  </span>Các số được nhập các nhau bằng dấu ","</td></tr>
        </table>
    </form>
</body>