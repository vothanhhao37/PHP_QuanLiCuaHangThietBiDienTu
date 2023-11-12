<!DOCTYPE html>
<html>
<head>
    <title>Bảng cửu chương</title>
    <style>
        table {
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Bảng cửu chương từ 2 đến 10</h1>
    <table>
        <thead>
            <tr>
                <th>Cửu chương</th>
                <th>Kết quả</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 2; $i <= 10; $i++) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>";
                for ($j = 1; $j <= 10; $j++) {
                    echo $i . " x " . $j . " = " . ($i * $j) . "<br>";
                }
                echo "</td>";
                echo "</tr>";
            }
            
            ?>            
        </tbody>
    </table>
    <?php
        $a=rand(1,1000);
        function SNT($a){
            if($a<2) return true;
            else{
                for($i=2;$i<$a/2;$i++){
                    if($a%$i==0) return false;
                }
                return true;
            }
        }
        if(SNT($a)==true) echo "$a là số nguyên tố";
        else echo "$a không phải là số nguyên tố";
        $sum=0;
        for($i=1;$i<$a;$i++)
            if($i%2==1 && ($i>=10 && $i<=99))
                $sum+=$i;
        echo "Tổng các số lẻ có 2 chữ số và nhỏ hơn $a là $sum";
    ?>
</body>
</html>