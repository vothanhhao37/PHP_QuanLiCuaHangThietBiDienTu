<?php
include("../LOGIN_REQUIRED/LogIn_Required.php"); 
include("../../db_connect.php");
$masp = $_POST['MASP'];
$response = array();
// Tìm kiếm và cập nhật dữ liệu trong cơ sở dữ liệu
$gioHang = mysqli_query($conn, "SELECT * FROM giohang 
WHERE giohang.MASP = '$masp' and MAKH = '{$_SESSION['MAKH']}'");
if (isset($gioHang)) {
    $deleteQuery = "DELETE FROM giohang 
                WHERE giohang.MASP = '$masp' AND MAKH = '{$_SESSION['MAKH']}'";
    mysqli_query($conn, $deleteQuery);
    $response['success'] = true;
    $_SESSION['SLGH'] -=1;
    $response['slgh'] =  $_SESSION['SLGH'];
}
else
$response['success'] = false;
echo json_encode($response, JSON_NUMERIC_CHECK);
?>