<?php
	$n = rand(1,1000);
	
	function checkPrime(int $n)
	{
		for ($i = 2; $i < $n; $i++)
		{
			if ($n % $i == 0) return false;
		}
		return true;
	}

	function digits(int $n)
	{
		$i = 0;
		while ((int)$n > 0)
		{
			$n /= 10;
			$i++;
		}
		return $i;
	}

	function sum(int $n)
	{
		if (digits($n) > 2) return 2475;
		$res = 0;
		for ($i = 11; $i <= $n; $i++)
			if (digits($i) == 2 && $i % 2 != 0) $res += $i;
		return $res;
	}

	if (checkPrime($n))
		echo "$n la so nguyen to";
	else echo "$n khong la so nguyen to";
	echo "<br>";
	$sum = sum($n);
	echo "tong = $sum";
	echo "<br>";
	$a = digits($n);
	echo "so chu so cua $n la $a";
?>
