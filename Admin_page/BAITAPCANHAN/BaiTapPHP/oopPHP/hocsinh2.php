<?php
class hocsinh2
{
    private $ma;
    public $ho;
    public $ten;
    public $ngsinh;
    public $diemtb;
    const HESO = 2;

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
    function tinhDiem()
    {
        return $this->diemtb * self::HESO;
    }
}
$hs1 = new hocsinh2();
$hs1->setMa("12345");
$hs1->ho = "Đào Văn ";
$hs1->ten = "Minh";
$hs1->ngsinh = "23/12/2002";
$hs1->diemtb = 7;
echo "<h3>Thông tin học sinh </h3>";
echo "Mã HS: " . $hs1->getMa();
echo "<br> Họ tên: " . $hs1->getHoTen();
echo "<br> Tuổi: {$hs1->getTuoi()}";
echo "<br> Điểm đạt được:  {$hs1->tinhDiem()}";
echo "Theo Hệ số là: " . hocsinh2::HESO;



?>