<title>
    Phát sinh mảng và tính tổng
</title>

<body>
    <?php 
        $sum = $min = $max = $input = 0;
        $arr = "";  
        if (isset($_POST['submit']))
        {
            if (isset($_POST['input']))
            {
                $input = trim($_POST['input']);
                $my_arr = init_arr($input);
                $arr = implode(" ", $my_arr);
                $min = min_arr($my_arr);
                $max = max_arr($my_arr);
                $sum = sum_arr($my_arr);    
            }
        }
        // generate a $len elements array with random indexes value from 0 to 20
        function init_arr($len) : array
        {
            $a = array();
            for ($i = 0; $i < $len; $i++)
            {
                $a[$i] = rand(0,20);
            }
            return $a;
        }

        function sum_arr($arr)
        {
            $sum = 0;
            foreach ($arr as $index)
            {
                $sum += $index;
            }
            return $sum;
        }

        function min_arr($arr)
        {
            $min = 21;
            foreach ($arr as $index)
            {
                $min = $min > $index ? $index : $min;
            }
            return $min;
        }

        function max_arr($arr)
        {
            $max = -1;
            foreach ($arr as $index)
            {
                $max = $max < $index ? $index : $max;
            }
            return $max;
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
            <tr style="background-color: green;"><td colspan= 2 align=center><h2>Phát sinh mảng và tính tổng</h2></td></tr>
            <tr>
                <td class="colored-col">Nhập số phần tử: </td>
                <td class="colored-col"><input type="text" value="<?php echo $input ?>" name="input"></td>
            </tr>
            <tr>
                <td class="colored-col"></td>
                <td class="colored-col"><span><input type="submit" name="submit" value="Phát sinh và tính toán"><span></td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input type="text" value="<?php echo $arr ?>" disabled></td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng: </td>
                <td><input type="text" value="<?php echo $max; ?>" disabled></td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng: </td>
                <td><input type="text" value="<?php echo $min ?>" disabled></td>
            </tr>
            <tr>
                <td>Tổng mảng: </td>
                <td><input type="text" value="<?php echo $sum ?>" disabled></td>
            </tr>
            <tr><td colspan=2 align=center>(<span>Ghi chú: </span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td></tr>
        </table>
    </form>
</body>