<?php
include("../../db_connect.php");
session_start();
$result = mysqli_query($conn, "SELECT * FROM khachhang WHERE khachhang.MAKH = '{$_SESSION['MAKH']}'");
if(isset($_POST["saveChanges"]))
{
    $tenkh = $_POST["TENKH"];
    $diachi = $_POST["DIACHI"];
    $sdt = $_POST["SDT"];
    $email = $_POST["EMAIL"];
    $cmnd = $_POST["CMND"];
    
    mysqli_query($conn,"UPDATE khachhang 
    SET TENKH = '$tenkh', DIACHI = '$diachi', SDT = '$sdt', EMAIL = '$email', CMND = '$cmnd'
    WHERE khachhang.MAKH = '{$_SESSION['MAKH']}'");
    
}
header("Location: CaiDatThongTin.php?$check");
?>