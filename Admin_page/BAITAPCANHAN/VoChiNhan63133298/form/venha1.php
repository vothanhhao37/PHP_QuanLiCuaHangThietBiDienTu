<?php

	$n = rand(-50,50);

	if ($n < 0)
	{
		echo "$n la am <br>";
		$n = -$n;
	}
	else echo "$n la so duong <br>";

	$arr = [];

	for ($i = 0; $i < $n; $i++)
		$arr[$i] = rand(-100,100);
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	$sum = 0;
	for($i = 0; $i < $n; $i++)
		if ($i % 2 != 0) $sum += $arr[$i];
	echo "<br> tong la $sum";
?>
