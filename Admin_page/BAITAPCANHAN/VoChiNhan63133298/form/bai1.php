<?php
	$n = rand(1,100);
	echo "n = $n";
	echo "<br> cac so chan < $n la: ";
	for ($i = 0; $i < $n; $i++)
		if ($i %2 == 0)
			echo "$i  "; 
?>
