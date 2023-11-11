

	<?php
	if (isset($_POST['a'])) {
		$a = trim($_POST['a']);
	} else
		$a = 0;
	if (isset($_POST['b'])) {
		$b = trim($_POST['b']);
	} else
		$b = 0;

	if (is_numeric($a) && is_numeric($b)) {
		$alert = "";
		if ($b < 10 || $b > 100) {$alert = "b must me in range [10;100]";$area = 0; $peri = 0;}
		else switch ($a) {
			case 1:
				$area = $b * $b;
				$peri = $b * 4;
				$alert = "A square with side = $b.";
				break;
				case 2:
					$area = $b * $b * pi();
					$peri = $b * 2 * pi();
					$alert = "A circle with radius = $b.";
					break;
					case 3:
						$area = (sqrt(3) / 4) * pow($b, 2);
						$peri = $b * 3;
						$alert = "A equilateral triangle with side = $b.";
						break;
			case 4:
				$area = $a * $b;
				$peri = ($b + $a) * 2;
				$alert = "A rectangle with width = $a and height = $b.";
				break;
				default:
				$area = 0;
				$peri = 0;
				$alert = "a must be in [1;4]!";
				break;
			}
		} else {
		$alert = "Enter a number!";
		$area = 0;
		$peri = 0;
	}



	?>
	<style>
		body
		{
			display: flex;
			flex-direction: column;
		}
		h1
		{
			align-self: center;
			flex: 1;
		}
		form
		{
			align-self: center;
			width: 500px;
			display: flex;
			flex-direction: column;
			background-color: purple;
			border-radius: 10px;
		}

		p
		{
			display: inline-block;
			width: 50%;
		}

		.btn
		{
			background-color: cadetblue;
			width: 100px;
			height: 50px;
			align-self: center;
		}

		.alert
		{
			align-self: center;
			width: 100%;
		}

	
	</style>

	<h1>Area and Perimeter Calculator</h1>
	<form align='center' action="" method="post">
		<div><p>Enter a (1-4) : </p><input type="text" name="a" value="<?php echo $a ?>"> </div>
		<div><p>Enter b (10-100): </p><input type="text" name="b" value="<?php echo $b ?>"></div>
		<div><p>Perimeter: </p><input type="text" disabled value="<?php echo $peri ?>"> </div>
		<div><p>Area: </p><input type="text" disabled value="<?php echo $area ?>"></div>
		<input class="btn" type="submit" value="Calculate" name="submit">
		<p class="alert">
			<?php echo $alert ?>
		</p>
	</form>
