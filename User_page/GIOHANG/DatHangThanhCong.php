
<?php 

include("../../db_connect.php");
session_start();
include '../Shared_Layout/header.php';
function LayMaHoaDon($db) {
    // Lấy danh sách các MAKH từ bảng HOADON
    $query = "SELECT MAHOADON FROM hoadon";
    $result = mysqli_query($db, $query);

    // Lấy MAHOADON lớn nhất
    $maMax = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $maHD = $row['MAHOADON'];
        if ($maHD > $maMax) {
            $maMax = $maHD;
        }
    }

    // Tạo mã KH mới
    $maHD = intval(substr($maMax, 2)) + 1;
    $HD = str_pad($maHD, 4, '0', STR_PAD_LEFT);
    return 'HD' . $HD;
}
$mahd = LayMaHoaDon($conn);

//Thêm vào bảng hóa đơn
mysqli_query($conn,"INSERT INTO `hoadon` (`MAHOADON`, `MANV`, `MAKH`, `NGAYTAO`, `TINHTRANGDONHANG`) 
VALUES ('$mahd', null, '{$_SESSION['MAKH']}', NOW(), 'Đã đặt hàng');");


$selectedProducts = $_SESSION['selectedProducts'];
//Thêm từng chi tiết hóa đơn
foreach ($selectedProducts as $product) {
    $masp = $product['MASP'];
    $soluong = $product['SOLUONG'];
    $dongiaxuat_querry = mysqli_query($conn,"SELECT DONGIA FROM giohang WHERE MASP = '$masp' and MAKH = '{$_SESSION['MAKH']}' LIMIT 1 ");
    $row = mysqli_fetch_assoc($dongiaxuat_querry);
    $dongia = $row['DONGIA'];
    mysqli_query($conn,"INSERT INTO `chitiethoadon` (`MAHOADON`, `MASP`, `SOLUONG`, `DONGIAXUAT`) 
VALUES ('$mahd', '$masp', $soluong,  $dongia)");

    
}


?>
<title>Đặt hàng thành công</title>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    #payment_success {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }

    #payment_success h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    #payment_success p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    #payment_success i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    #payment_success .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>
<div id="payment_success">
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Thành công</h1>
        <p>Chúng tôi đã nhận được đơn đặt hàng của bạn</p>
    </div>
</div>

<script>
    var countdown = 3; // Số giây đếm ngược
    var countdownElement = document.createElement('p');
    countdownElement.innerText = 'Bạn sẽ trở về trang chủ sau ' + countdown + ' giây';
    document.querySelector('.card').appendChild(countdownElement);

    // Đếm ngược và chuyển hướng về trang ../../HOME/index.php
    var countdownInterval = setInterval(function() {
        countdown--;
        countdownElement.innerText = 'Bạn sẽ trở về trang chủ sau ' + countdown + ' giây';
        if (countdown === 0) {
            clearInterval(countdownInterval);
            window.location.href = "../HOME/index.php";
        }
    }, 1000);

    // Ngăn người dùng quay lại trang trước đó
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>

<?php include '../Shared_Layout/footer.php';?>