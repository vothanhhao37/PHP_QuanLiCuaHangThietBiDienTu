<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Thông tin sữa</title>

</head>

<body>
	<style>
		th,
		td {
			text-align: center;
		}

		a
		{
			margin-right: 5px;
		}
	</style>
	<?php
	$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

		or die('Could not connect to MySQL: ' . mysqli_connect_error());

	$rowsPerPage = 10; //số mẩu tin trên mỗi trang, giả sử là 10
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}

	$offset = ($_GET['page'] - 1) * $rowsPerPage;
	//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
	$result = mysqli_query($conn, "SELECT Ma_sua, ten_sua, Trong_luong, 
Don_gia FROM sua LIMIT $offset,$rowsPerPage");

	echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";

	echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

	echo '<tr>

    <th width="50">STT</th>

     <th width="50">Mã sữa</th>

    <th width="350">Tên sữa</th>

    <th width="100">Trọng lượng</th>

    <th width="200">Đơn giá</th>
</tr>';



	if (mysqli_num_rows($result) <> 0) {
		$stt = 1;

		while ($rows = mysqli_fetch_row($result)) {
			echo "<tr>";

			echo "<td>$stt</td>";

			echo "<td>$rows[0]</td>";

			echo "<td>$rows[1]</td>";

			echo "<td>$rows[2]</td>";

			echo "<td>$rows[3]</td>";


			echo "</tr>";

			$stt += 1;

		}

	}

	echo "</table>";

	$re = mysqli_query($conn, 'select * from sua');
	//tổng số mẩu tin cần hiển thị
	$numRows = mysqli_num_rows($re);
	//tổng số trang
	$maxPage = floor($numRows / $rowsPerPage) + 1;

	echo "<div align='center' style='padding-top : 20px'>";
	// Go to the first page
	echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . (1) . "> << </a> "; 
	// Go to the previous page
	if ($_GET['page'] > 1)
		echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "> < </a> ";

	// Go to a specific page
	for ($i = 1; $i <= $maxPage; $i++) {
		if ($i == $_GET['page']) {
			echo '<b>Trang' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
		} else
			echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang" . $i . "</a> ";
	}

	//Go to the next page
	if ($_GET['page'] < $maxPage)
		echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "> > </a>";	
	//Go to the last page
	echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($maxPage) . ">  >>  </a>";	
	echo "</div>";

	mysqli_free_result($result);
	mysqli_close($conn);
	?>

</body>

</html>