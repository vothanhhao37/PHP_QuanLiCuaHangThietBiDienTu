<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="text" name="test" id="test">
    <input type="submit" value="Kiểm tra">
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nhan_so = $_POST["test"];
    if($nhan_so < 2)
        echo "$nhan_so không phải số nguyên tố";
    else if($nhan_so == 2) {
        echo "$nhan_so là số nguyên tố";
    } 
    $sum = 0;
    for($i=0;$i<$nhan_so;$i++) {
        if($i%2 == 1 && ($i >= 10 && $i <= 99 )) {
            $sum+=$i;
    }
    echo "Tổng các số lẻ có 2 chữ số và nhỏ hơn $nhan_so là $sum";
    //đếm số chữ số
    $soCS = 0;
    $m = $n;
    while ($n > 0) {
        $soDV = $n % 10;
        $n = $n / 10;
        $soCS++;
    }
}
}

?>