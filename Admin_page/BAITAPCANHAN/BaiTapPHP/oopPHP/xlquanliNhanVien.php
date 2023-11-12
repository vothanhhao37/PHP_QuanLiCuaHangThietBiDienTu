<?php
abstract class NhanVien
{
    protected $hoTen, $gioiTinh, $ngayVaoLam, $hsLuong, $soCon;
    const LUONG_CO_BAN = 5000000;

    public function getHoTen()
    {
        return $this->hoTen;
    }

    public function setHoTen($hoTen): self
    {
        $this->hoTen = $hoTen;
        return $this;
    }

    public function getGioiTinh()
    {
        return $this->gioiTinh;
    }

    public function setGioiTinh($gioiTinh): self
    {
        $this->gioiTinh = $gioiTinh;
        return $this;
    }

    public function getNgayVaoLam()
    {
        return $this->ngayVaoLam;
    }

    public function getSoCon()
    {
        return $this->soCon;
    }

    public function setSoCon($soCon): self
    {
        $this->soCon = $soCon;
        return $this;
    }
    public function getHsLuong()
    {
        return $this->hsLuong;
    }


    public function setHsLuong($hsLuong)
    {
        $this->hsLuong = $hsLuong;

        return $this;
    }



    abstract public function tinhTienLuong();
    abstract public function tinhTroCap();
    public function tinhTienThuong()
    {
        $soNamLamViec = date('Y') - date('Y', strtotime($this->ngayVaoLam));
        return $soNamLamViec * 1000000;
    }
}
class NhanVienVanPhong extends NhanVien
{
    protected $soNgayVang;
    const DINH_MUC_VANG = 4;
    const DON_GIA_PHAT = 50000;
    public function getSoNgayVang()
    {
        return $this->soNgayVang;
    }

    public function setSoNgayVang($soNgayVang): self
    {
        $this->soNgayVang = $soNgayVang;
        return $this;
    }
    public function tinhTienPhat()
    {
        if ($this->soNgayVang > self::DINH_MUC_VANG)
            return ($this->soNgayVang) * self::DON_GIA_PHAT;
    }
    public function tinhTroCap()
    {
        if ($this->gioiTinh == "Nữ")
            return 200000 * $this->soCon * 1.5;
        else
            return 200000 * $this->soCon;
    }
    public function tinhTienLuong()
    {
        return self::LUONG_CO_BAN * $this->hsLuong - $this->tinhTienPhat();
    }
}

class NhanVienSanXuat extends NhanVien
{
    protected $soSP;
    const DINH_MUC_SAN_PHAM = 100;
    const DON_GIA_SAN_PHAM = 20000;
    public function getSoSP()
    {
        return $this->soSP;
    }
    public function setSoSP($soSP): self
    {
        $this->soSP = $soSP;
        return $this;
    }

    public function tinhTienThuong()
    {
        if ($this->soSP > self::DINH_MUC_SAN_PHAM)
            return ($this->soSP - self::DINH_MUC_SAN_PHAM) * self::DON_GIA_SAN_PHAM * 0.03;
    }
    public function tinhTroCap()
    {
        return $this->soCon * 120000;
    }
    public function tinhTienLuong()
    {
        return (($this->soSP) * self::DON_GIA_SAN_PHAM) + $this->tinhTienThuong();
    }
}

// Xử lí form dữ liệu
if (isset($_POST['hoten']) && $_POST['socon'] && $_POST['ngaysinh'] && $_POST['ngayvaolam'] && $_POST['ngayvaolam'] && $_POST['hesoluong'] && $_POST['songayvang'] && $_POST['sosanpham']) {
    $hoten = $_POST['hoten'];
    $socon = $_POST['socon'];
    $ngaysinh = $_POST['ngaysinh'];
    $ngayvaolam = $_POST['ngayvaolam'];
    $hesoluong = $_POST['hesoluong'];
    $songayvang = $_POST['songayvang'];
    $sosanpham = $_POST['sosanpham'];

} else {
    $hoten = "";
    $socon = "";
    $ngaysinh = "";
    $ngayvaolam = "";
    $hesoluong = "";
    $songayvang = "";
    $sosanpham = "";

}

if (isset($_POST['tienluong']) && $_POST['trocap'] && $_POST['tienthuong'] && $_POST['tienphat'] && $_POST['thuclinh']) {
    $tienluong = $_POST['tienluong'];
    $trocap = $_POST['trocap'];
    $tienthuong = $_POST['tienthuong'];
    $tienphat = $_POST['tienphat'];
    $thuclinh = $_POST['thuclinh'];
} else {
    $tienluong = "";
    $trocap = "";
    $tienthuong = "";
    $tienphat = "";
    $thuclinh = "";
}
if (isset($_POST['nut'])) {

    if (isset($_POST['loainv']) == 'vp') {
        $nvvp = new NhanVienVanPhong();
        $trocap = $nvvp->tinhTroCap();
        $tienluong = $nvvp->tinhTienLuong();
        $tienthuong = $nvvp->tinhTienthuong();
        $tienphat = $nvvp->tinhTienPhat();
        $thuclinh = $trocap + $tienluong + $tienthuong + $tienphat;
    }
    
}

?>