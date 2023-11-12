<?php

class HocSinh
{
    private $ma;
    var $ho;
    var $ten;
    var $ngaysinh;
    var $diemtb;
    const HESO = 2;
    function getHoten()
    {
        return $this->ho . " " . $this->ten;
    }
    function getDTB()
    {
        return $this->diemtb;
    }
    function getTuoi()
    {
        $this->ten;
        $ns = explode("/", $this->ngaysinh);
        return date("Y") - $ns[2];
    }
    function tinhDiem()
    {
        return $this->diemtb * self::HESO;
    }
    function getMa()
    {
        return $this->ma;
    }
    
}

$hs1 = new HocSinh();
$hs1->ho = "Võ Thanh";
$hs1->ten = "Hào";
$hs1->diemtb = 7.6;
$hs1->ngaysinh = "03/07/2002";
echo "<h4>Họ tên: ", $hs1->getHoten(), "</h4>";
echo "<br>Tuổi :{$hs1->getTuoi()}";
echo "<br>Điểm trung bình :{$hs1->getDTB()}";
echo "<br>Điểm :{$hs1->tinhDiem()}";