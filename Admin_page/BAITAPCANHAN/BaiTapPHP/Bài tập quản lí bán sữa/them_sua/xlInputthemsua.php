<?php
//Mã sữa
if (isset($_POST['masua'])) {
    $id = $_POST['masua'];
} else
    $id = '';
//Tên sữa
if (isset($_POST['tensua'])) {
    $tenSua = $_POST['tensua'];
} else
    $tenSua = '';

//Hãng sữa
if (isset($_POST['hangsua'])) {
    $hangSua = $_POST['hangsua'];
} else
    $hangSua = '';

// Loại sữa
if (isset($_POST['loaisua'])) {
    $loaiSua = $_POST['loaisua'];
} else
    $loaiSua = '';
//Trọng lượng
if (isset($_POST['trongluong'])) {
    $trongLuong = $_POST['trongluong'];
} else
    $trongLuong = '';
//Đơn giá
if (isset($_POST['dongia'])) {
    $donGia = $_POST['dongia'];
} else
    $donGia = '';
//thành phần dinh dưỡng
if (isset($_POST['tpdd'])) {
    $thanhPhanDinhDuong = $_POST['tpdd'];
} else
    $thanhPhanDinhDuong = '';
//lợi ích
if (isset($_POST['loiich'])) {
    $loiIch = $_POST['loiich'];
} else
    $loiIch = '';


?>