<body>
	<style>
		table, th, td, tr 
		{
			border: 1px solid black;
			text-align: center;
		}
	</style>
	<?php $m = 0;
	$n = 0; ?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Nhập m: </td>
				<td><input type="text" name="m" value="<?php echo $m; ?>"></td>
			</tr>
			<tr>
				<td>Nhập n: </td>
				<td><input type="text" name="n" value="<?php echo $n; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="submit"></td>
			</tr>
		</table>

	</form>
	<?php
	if (isset($_POST['m']))
		$m = (int) $_POST['m'];
	if (isset($_POST['n']))
		$n = (int) $_POST['n'];
	if (isset($_POST['submit'])) {
		$matrix = [];

		if ($m < 2 || $m > 5 || $n < 2 || $n > 5) {
			echo "m và n phải nằm trong khoảng từ 2 đến 5";
		} else {
			for ($i = 0; $i < $m; $i++) {
				$matrix[$i] = [];
				for ($j = 0; $j < $n; $j++)
					$matrix[$i][$j] = rand(-100, 100);
			}

			echo "Ma trận tạo ra là: <br>";
			echo "<table>";
			foreach ($matrix as $row) {
				echo "<tr>";
				foreach ($row as $number) {
					echo "<td style=\"width:80px;\">$number</td>";
				}
				echo "</tr>";
			}
			echo "</table>";


			echo "Phần tử âm thay bằng 0 : <br>";

			foreach ($matrix as &$row) foreach ($row as &$index)
					if ($index < 0)
						$index = 0;

			echo "<table>";
			 foreach ($matrix as $row) {
				echo "<tr>";
				foreach ($row as $number) {
					echo "<td style=\"width:80px;\">$number</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	?>
</body>