<!DOCTYPE html>
<html>

<head>
    <title>Ma trận</title>
</head>

<body>
    <h1>Tạo và thao tác với ma trận</h1>
    <form method="post" action="">
        <table>
            <tr>
                <td> <label for="rows">Số dòng (2-5):</label></td>
                <td> <input type="text" id="rows" name="rows" min="2" max="5"></td>
            </tr>
            <tr>
                <td>  <label for="cols">Số cột (2-5):</label></td>
                <td> <input type="text" id="cols" name="cols" min="2" max="5"></td>
            </tr>
            <tr><td colspan="2"> <input type="submit" value="Tạo ma trận"></td></tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rows = intval($_POST["rows"]);
        $cols = intval($_POST["cols"]);

        // Kiểm tra và tạo ma trận ngẫu nhiên
        if ($rows >= 2 && $rows <= 5 && $cols >= 2 && $cols <= 5):
            $matrix = [];
            for ($i = 0; $i < $rows; $i++):
                for ($j = 0; $j < $cols; $j++):
                    $matrix[$i][$j] = mt_rand(-1000, 1000);
                endfor;
            endfor;
        
            // Hiển thị ma trận
            echo "<h2>Ma trận:</h2>";
            echo "<textarea style='width:250px;height:100px' rows=\"$rows\" cols=\"$cols\">";
            for ($i = 0; $i < $rows; $i++):
                for ($j = 0; $j < $cols; $j++):
                    echo $matrix[$i][$j] . " ";
                endfor;
                echo "\n";
            endfor;
            echo "</textarea>";
        
            // Hiển thị phần tử thuộc dòng chẵn cột lẻ
            echo "<h2>Phần tử thuộc dòng chẵn cột lẻ:</h2>";
            for ($i = 0; $i < $rows; $i += 2):
                for ($j = 1; $j < $cols; $j += 2):
                    echo $matrix[$i][$j] . " ";
                endfor;
            endfor;
        
            // Tính tổng các phần tử là bội số của 10
            $sum = 0;
            for ($i = 0; $i < $rows; $i++):
                for ($j = 0; $j < $cols; $j++):
                    if ($matrix[$i][$j] % 10 === 0):
                        $sum += $matrix[$i][$j];
                    endif;
                endfor;
            endfor;
            echo "<h2>Tổng các phần tử là bội số của 10: $sum</h2>";
        else:
            echo "<p>Số dòng và số cột phải nằm trong khoảng từ 2 đến 5.</p>";
        endif;
    }
    ?>
</body>

</html>