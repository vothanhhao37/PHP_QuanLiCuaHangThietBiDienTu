<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị của n từ form
    $n = $_POST["n"];

    // Phát sinh mảng ngẫu nhiên
    $mang = array();
    for ($i = 0; $i < $n; $i++) {
        $mang[] = rand();
    }

    // a- Hiển thị mảng phát sinh ngẫu nhiên có độ dài n
    echo "<strong>Mảng phát sinh ngẫu nhiên:</strong> ";
    echo implode(", ", $mang) . "<br>";

    // b- Đếm số phần tử chẵn trong mảng
    $soChan = 0;
    foreach ($mang as $value) {
        if ($value % 2 == 0) {
            $soChan++;
        }
    }
    echo "<strong>Số phần tử chẵn:</strong> " . $soChan . "<br>";

    // c- Đếm số phần tử nhỏ hơn 100 trong mảng
    $soNhoHon100 = 0;
    foreach ($mang as $value) {
        if ($value < 100) {
            $soNhoHon100++;
        }
    }
    echo "<strong>Số phần tử nhỏ hơn 100:</strong> " . $soNhoHon100 . "<br>";

    // d- Tính tổng các số âm trong mảng
    $tongSoAm = 0;
    foreach ($mang as $value) {
        if ($value < 0) {
            $tongSoAm += $value;
        }
    }
    echo "<strong>Tổng các số âm:</strong> " . $tongSoAm . "<br>";

    // e- In ra vị trí của các phần tử có chữ số kề cuối là 0
    echo "<strong>Vị trí các phần tử có chữ số kề cuối là 0:</strong> ";
    $viTriKetCuoiLa0 = array();
    foreach ($mang as $index => $value) {
        if (abs($value) % 10 == 0) {
            $viTriKetCuoiLa0[] = $index;
        }
    }
    echo implode(", ", $viTriKetCuoiLa0) . "<br>";

    // f- Sắp xếp mảng theo thứ tự tăng dần và in ra màn hình
    sort($mang);
    echo "<strong>Mảng đã sắp xếp:</strong> ";
    echo implode(", ", $mang) . "<br>";
}
?>

<form action="" method="post">
    <label for="n">Nhập số tự nhiên n:</label>
    <input type="number" name="n" id="n" required>
    <input type="submit" value="Thực hiện">
</form>