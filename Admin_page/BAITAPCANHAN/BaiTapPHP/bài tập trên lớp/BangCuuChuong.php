<table border="1px">
<tr>
<?php
for($i = 1; $i < 10; $i ++) {
    echo "<td>";
    echo " Bảng cửu chương $i: <br>";
    for($j = 1; $j <= 10; $j ++) {
        echo "$i x $j = " . ($i * $j);
        echo "<br>";
    }
    echo "</td>";
}
?>
</tr>
</table>