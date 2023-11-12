<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class hocsinh
    {
        private $ma;
        public $ho;
        public $ten;
        public $ngsinh;
        private $diemtb;

        function setMa($maHS)
        {
            $this->ma = $maHS;
        }
        function getMa()
        {
            return $this->ma;
        }

        function getHoTen()
        {
            return $this->ho . " " . $this->ten;
        }
        function getTuoi()
        {
            $ns = explode("/", $this->ngsinh);
            return date("Y") - $ns[2];
        }
    }
    $hs1 = new hocsinh();
    $hs1->setMa("12345");
    $hs1->ho = "Đào Văn ";
    $hs1->ten = "Minh";
    $hs1->ngsinh = "23/12/2002";
    echo "<h3>Thông tin học sinh </h3>";
    echo "Mã HS: " . $hs1->getMa();
    echo "<br> Họ tên: " . $hs1->getHoTen();
    echo "<br> Tuổi: {$hs1->getTuoi()}";
    ?>
</body>

</html>