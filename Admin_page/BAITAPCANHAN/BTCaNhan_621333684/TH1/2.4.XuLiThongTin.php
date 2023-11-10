<?php 
if(isset($_POST["huy"]))
{
    header("Location: 2.4.php");
}


if(isset($_POST["gui"]))
{
    $hoTen = $_POST["ten"];
    $diaChi = $_POST["dc"];
    $soDienThoai = $_POST["sdt"];
    $gioiTinh = $_POST["gt"];
    $quocTich = $_POST["quocTich"];
    $cacMonHoc = $_POST["monHoc"];
    $ghiChu = $_POST["ghiChu"];

    // Hiển thị thông tin đã gửi
    echo "<h2>Thông tin đã gửi:</h2>";
    echo "<p><strong>Họ tên:</strong> " . $hoTen . "</p>";
    echo "<p><strong>Địa chỉ:</strong> " . $diaChi . "</p>";
    echo "<p><strong>Số điện thoại:</strong> " . $soDienThoai . "</p>";
    echo "<p><strong>Giới tính:</strong> " . $gioiTinh . "</p>";
    echo "<p><strong>Quốc tịch:</strong> " . $quocTich . "</p>";
    echo "<p><strong>Các môn đã được học:</strong></p>";
    echo "<ul>";
    foreach ($cacMonHoc as $monHoc) {
        echo "<li>" . $monHoc . "</li>";
    }
    echo "</ul>";
    echo "<p><strong>Ghi chú:</strong> " . $ghiChu . "</p>";

}
?>