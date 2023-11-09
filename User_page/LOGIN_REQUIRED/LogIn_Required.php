<?php 
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["MAKH"])){
    header("Location: ../AUTHENTICATION/DangNhap.php");
    exit();
}
?>