<?php
function sum($a, &$b)
{
    $b = $a * 2;
}
$x = 5;
$y = 20;
sum($x, $y);
echo "$x, $y"; // x = 5, y = 10 || a là tham trị nên giá trị k thay đổi. b là tham chiếu nên đối số sẽ được thay đổi => b = a * 2 => y = 5 * 2 = 10 
?>