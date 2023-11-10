<?php
	require("../../../shared/header.php");
?>
	<style type="text/css">
		.heading {
			background-color: red;
		}

		textarea {
			width: 98%;
		}

		input {
			width: 96%;
		}

		table {
			color: #ffff00;
			width: 800px;
			background-color: gray;

		}

		table th {

			background-color: blue;

			font-style: vni-times;

			color: yellow;
		}

		input[type=submit] {
			background-color: green;
		}
	</style>

	<?php


	function init_random_arr($n): array
	{
		$arr = [];

		for ($i = 0; $i < $n; $i++) {
			$arr[$i] = rand(-1000, 1000);
		}
		return $arr;
	}

	function penultimate_digit(int $num)
	{
		if ($num < 10)
			return -1;
		$num /= 10;
		return $num % 10;
	}

	function print_arr(array $arr)
	{
		global $res;
		$str = implode("  ", $arr);
		$res .= "$str\n";
	}

	$n = 0;
	$res = "";

	if (isset($_POST['submit'])) {
		if (gettype($_POST['n'] != "int"))
		if (isset($_POST['n']) && $_POST['n'] > 0) {
			$n = trim($_POST['n']);
			$arr = init_random_arr($n);
			// Print generated array
			$res .= "Mảng tạo ra: ";
			print_arr($arr);

			// Count even number in array
			$count_even = 0;
			foreach ($arr as $index) {
				if ($index % 2 == 0)
					$count_even++;
			}
			$res .= "Có tất cả $count_even số chẵn trong mảng. \n";

			// Count <100 number in array
			$count_less_than_hundred = 0;
			foreach ($arr as $index) {
				if ($index < 100)
					$count_less_than_hundred++;
			}
			$res .= "Có tất cả $count_less_than_hundred số bé hơn 100 trong mảng. \n";

			// Sum of all negative numbers in array
			$sum_negative = 0;
			foreach ($arr as $index) {
				if ($index < 0)
					$sum_negative += $index;
			}
			$res .= "Tổng các số âm trong mảng là $sum_negative. \n";

			// Print all keys of elements has penultimate digit equals 0
			$res .= "Vị trí các số có số kế cuối bằng 0 là: ";
			$check = false;
			for ($i = 0; $i < $n; $i++) {
				if (penultimate_digit($arr[$i]) == 0) {
					$res .= "$i ";
					$check = true;
				}
			}
			if (!$check)
				$res .= "Không có số nào.";
			$res .= "\n";

			// Sort ascending
			$res .= "Mảng sau khi sắp xếp tăng dần: ";
			for ($i = $n - 1; $i > 0; $i--) {
				for ($j = 0; $j < $i; $j++) {
					if ($arr[$j] > $arr[$j + 1]) {
						$temp = $arr[$j];
						$arr[$j] = $arr[$j + 1];
						$arr[$j + 1] = $temp;
					}
				}
			}
			print_arr($arr);
		}
		else $res = "Vui lòng nhập vào số nguyên dương";
	}

	?>

	<form action="" method="post">

		<table>
			<tr class="heading">
				<td align="center" colspan="2">
					<h2>Một số thao tác trên mảng</h2>
				</td>
			</tr>
			<tr>
				<td align="center">
					Nhập n:
				</td>
				<td>
					<input type="text" name="n" value="<?php echo $n ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"> <input type="submit" name="submit" value="Xử lý"></td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea name="" id="" cols="30" rows="10"><?php echo $res ?></textarea>
				</td>
			</tr>
		</table>
	</form>
<?php
	require("../../../shared/footer.php");
?>