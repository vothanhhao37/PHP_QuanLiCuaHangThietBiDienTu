<title>Mảng 2 chiều</title>
<body>
    <?php 
        $row = $col = 0;
        $output = "";

        if (isset($_POST['row']))
        {
            $row = $_POST['row'];
        } else $output = "Row cannot be blank.";

        if (isset($_POST['col']))
        {
            $col = $_POST['col'];
        } else $output = "Col cannot be blank.";

        if (isset($_POST['submit']))
        {
            $matrix = array();
            for ($i = 0; $i < $row; $i++)
            {
                $matrix[$i] = array();
                for ($j = 0; $j < $col; $j++)
                {
                    $matrix[$i][$j] = rand(-1000,1000);
                }
            }
            show($matrix);
            show_evenrow_oddcol($matrix);
            $sum = sum_mul_10($matrix);
            $output .= "\n  $sum";
        }
        function show(array $matrix)
        {
            global $output;
            foreach ($matrix as $row)
            {
                foreach ($row as $index)
                {
                    $output .= "$index  ";
                }
                $output .= "\n";
            }
        }
        
        function show_evenrow_oddcol(array $matrix)
        {
            global $output;
            for ($i = 0; $i < count($matrix); $i++)
            {
                for ($j = 0; $j < count($matrix[$i]); $j++)
                {
                    if ($j % 2 == 0 && $i % 2 != 0)
                    {
                        $a = $matrix[$i][$j];
                        $output .= "$a  ";
                    } else $output .= "---  ";
                }
                $output .= "\n";
            }
        }

        function sum_mul_10(array $matrix) : int
        {
            $sum = 0;
            foreach ($matrix as $row)
            {
                foreach ($row as $index)
                {
                    $sum += ($index % 10 === 0) ? $index : 0;
                }
            }
            return $sum;
        }

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Enter number of rows (2 &lt; and &lt; 5) </td>
                <td><input type="text" name="row" value="<?php echo $row; ?>"></td>
            </tr>
            <tr>
                <td>Enter number of columns (2 &lt; and &lt; 5) </td>
                <td><input type="text" name="col" value="<?php echo $col; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Submit" name="submit"></td>
            </tr>
            <tr>
                <td colspan="2" style="width: 100%;"><textarea name="" id="" cols="60" rows="10"><?php echo $output; ?></textarea></td>
            </tr>
        </table>
    </form>
</body>