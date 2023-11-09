<?php
include("../../db_connect.php");
include("../LOGIN_REQUIRED/LogIn_Required.php"); 

$result = mysqli_query($conn, "SELECT * FROM khachhang WHERE khachhang.MAKH = '{$_SESSION['MAKH']}'");
if (isset($_POST["saveChanges"])) {
    $tenkh = $_POST["TENKH"];
    $diachi = $_POST["DIACHI"];
    $sdt = $_POST["SDT"];
    $email = $_POST["EMAIL"];
    $cmnd = $_POST["CMND"];
    $tenkh_error = $diachi_error = $sdt_error = $email_error = "";
    $error_check = false;

    if (empty($tenkh)) {
        $tenkh_error = "tenkh_error=Tên không được để trống";
        $error_check = true;
    }
    if (empty($diachi)) {
        $diachi_error = "diachi_error=Địa chỉ không được để trống";
        $error_check = true;
    }
    if (empty($sdt)) {
        $sdt_error = "sdt_error=Số điện thoại không được để trống";
        $error_check = true;
    }
    if (empty($email)) {
        $email_error = "email_error=Email không được để trống";
        $error_check = true;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "email_error=Email không hợp lệ";
        $error_check = true;
    }
    if ($error_check) {
        $error_query =  $tenkh_error ."&".  $diachi_error ."&". $sdt_error ."&". $email_error;       
        header("Location: CaiDatThongTin.php?" . $error_query);
        exit();
    }
    else {
        mysqli_query($conn, "UPDATE khachhang 
    SET TENKH = '$tenkh', DIACHI = '$diachi', SDT = '$sdt', EMAIL = '$email', CMND = '$cmnd'
    WHERE khachhang.MAKH = '{$_SESSION['MAKH']}'");
    }
}
header("Location: CaiDatThongTin.php?$check");
?>