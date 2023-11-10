<?php
include("../LOGIN_REQUIRED/LogIn_Required.php"); 
include("../../db_connect.php");
if (!isset($_SESSION['MAKH'])) {
    header('Location: ../AUTHENTICATION/DangNhap.php');
    exit();
}
$response = array();
$response['success'] = false;
$masp = $_POST['MASP'];
$soluong = $_POST['SOLUONG'];

$result = mysqli_query($conn, "SELECT count(SOLUONG) as SLGH FROM giohang WHERE MASP = '$masp' AND MAKH = '{$_SESSION['MAKH']}'");
$row = mysqli_fetch_assoc($result);
$slgh = $row['SLGH'];
if ($slgh!=0) {
    // Nếu sản phẩm đã tồn tại, cập nhật số lượng
    $updateQuery = "UPDATE giohang SET SOLUONG = SOLUONG + $soluong WHERE MASP = '$masp' AND MAKH = '{$_SESSION['MAKH']}'";
    mysqli_query($conn, $updateQuery);
    $response['success'] = true;
   
} else {
    // Nếu sản phẩm chưa tồn tại, tạo mới và thêm vào giỏ hàng
    $dongiaResult = mysqli_query($conn, "SELECT DONGIA FROM sanpham WHERE MASP = '$masp'");
    $dongiaRow = mysqli_fetch_assoc($dongiaResult);
    $dongia = $dongiaRow['DONGIA'];
    $insertQuery = "INSERT INTO giohang (MASP, SOLUONG, DONGIA, MAKH) VALUES ('$masp', $soluong, $dongia, '{$_SESSION['MAKH']}')";
    mysqli_query($conn, $insertQuery);
    // Tăng giá trị của SLGH trong session
    $_SESSION['SLGH'] +=1;
    $response['success'] = true;
   
}

// Trả về kết quả thành công hoặc thông tin khác cần thiết (nếu cần)

$response['slgh'] = $_SESSION['SLGH'];
echo json_encode($response, JSON_NUMERIC_CHECK);
?>