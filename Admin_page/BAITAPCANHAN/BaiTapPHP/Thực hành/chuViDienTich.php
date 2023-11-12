<html>

<head>
    
</head>

<body>
    <?php
    $a = rand(1, 4);
    $b = rand(10, 100);
    switch ($a) {
        case 1: // chu vi, diện hình vuông
            $cv = $b * 4;
            $dt = $b * $b;
            echo "chu vi hình vuông có độ dài $b là: $cv <br>";

            echo "diện tích hình vuông có độ dài $b là: $dt";
            break;

        case 2: // chu vi, diện hình tròn có bán kính là b
            $cv = $b * 2 * 3.14;
            $dt = $b * $b * 3.14;
            echo "chu vi hình tròn có độ dài $b là: $cv <br>";
            echo "diện tích hình tròn có độ dài $b là: $dt";
            break;

        case 3: // chu vi, diện hình tam giác có bán kính là b
            $cv = $b * 3;
            $dt = ($b * $b) * (sqrt(3) / 4);
            echo "chu vi hình tam giác đều có độ dài $b là: $cv <br>";
            echo "diện tích hình tam giác đều có độ dài $b là: $dt";
            break;
        case 4: // chu vi, diện hình chữ nhật có bán kính là b
            $cv = ($a + $b) * 2;
            $dt = $a * $b;
            echo "chu vi hình chữ nhật có chiều dài $a và chiều rộng $b là: $cv <br>";
            echo "diện tích hình chữ nhật là: $dt";
            break;
        default:
            echo "không tính được";
            break;
    }
    ?>
</body>

</html>