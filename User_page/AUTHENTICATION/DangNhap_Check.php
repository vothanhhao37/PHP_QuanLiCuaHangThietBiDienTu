<?php
session_start();
include("../../db_connect.php");

if (isset($_POST['TAIKHOAN']) && isset($_POST['MATKHAU'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$taikhoan = validate($_POST['TAIKHOAN']);
	$matkhau = validate($_POST['MATKHAU']);
	$user_data = 'TAIKHOAN=' . $taikhoan;
	if (empty($taikhoan)) {
		header("Location: DangNhap.php?error=Vui lòng nhập tên đăng nhập&$user_data");
		exit();
	} else if (empty($matkhau)) {
		header("Location: DangNhap.php?error=Vui lòng nhập mật khẩu&$user_data");
		exit();
	} else {
		$sql = "SELECT * FROM KHACHHANG WHERE TAIKHOAN='$taikhoan' AND MATKHAU='$matkhau'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['TAIKHOAN'] === $taikhoan && $row['MATKHAU'] === $matkhau) {

				$_SESSION['TENKH'] = $row['TENKH'];
				$_SESSION['TAIKHOAN'] = $row['TAIKHOAN'];
				$_SESSION['MAKH'] = $row['MAKH'];

                $_SESSION['SDT'] = $row['SDT'];
                $_SESSION['DIACHI'] = $row['DIACHI'];
                $_SESSION['EMAIL'] = $row['EMAIL'];
				$slgh = "SELECT COUNT(giohang.SOLUONG) AS total FROM giohang JOIN khachhang ON giohang.MAKH = khachhang.MAKH WHERE giohang.MAKH = '{$row['MAKH']}'";
	 			$result = mysqli_query($conn, $slgh);
				$_SESSION['SLGH'] = $result; 
				header("Location: ../HOME/index.php");
				exit();
			}
		} else {
			header("Location: DangNhap.php?error=Sai tên dăng nhập hoặc mật khẩu&$user_data");
			exit();
		}
	}

} else {
	header("Location: DangNhap.php");
	exit();
}