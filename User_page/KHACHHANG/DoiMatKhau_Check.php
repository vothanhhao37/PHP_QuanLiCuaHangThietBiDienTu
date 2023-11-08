<?php
session_start();
include "../../db_connect.php";

if (isset($_POST['MATKHAU']) && isset($_POST['MATKHAUMOI']) && isset($_POST['CONFIRM_MATKHAU'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $op = validate($_POST['MATKHAU']);
    $np = validate($_POST['MATKHAUMOI']);
    $c_np = validate($_POST['CONFIRM_MATKHAU']);
    $op_error =  $c_np_error=$np_error="";
    $error_check = false;

    if (empty($op)) {
        $op_error = "op_error=Yêu cầu nhập mật khẩu hiện tại";
        $error_check = true;
    }
    if (empty($np)) {
        $np_error = "np_error=Yêu cầu nhập mật khẩu mới";
        $error_check = true;
    }
    if ($np !== $c_np) {
        $c_np_error = "c_np_error=Mật khẩu không khớp";
        $error_check = true;

    }
    if ($error_check) {
        $error_query =  $op_error ."&".  $np_error ."&". $c_np_error ;       
        header("Location: DoiMatKhau.php?" . $error_query);
        exit();
    } else {
        $id = $_SESSION['MAKH'];
        $sql = "SELECT MATKHAU
                FROM khachhang WHERE 
                MAKH='$id' AND MATKHAU='$op'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {

            $sql_2 = "UPDATE khachhang
        	          SET MATKHAU='$np'
        	          WHERE MAKH='$id'";
            mysqli_query($conn, $sql_2);
            header("Location: DoiMatKhau.php?success=Đổi mật khẩu thành công");
            exit();

        } else {
            header("Location: DoiMatKhau.php?error=Incorrect password");
            exit();
        }

    }


} else {
    header("Location: ../HOME/index.php");
    exit();
}

