<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    abstract class CanBo
    {
        protected $ms, $hoTen, $gioiTinh, $ngaySinh, $dvCongTac;


        public function getMs()
        {
            return $this->ms;
        }


        public function setMs($ms): self
        {
            $this->ms = $ms;
            return $this;
        }


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

        public function getNgaySinh()
        {
            return $this->ngaySinh;
        }


        public function setNgaySinh($ngaySinh): self
        {
            $this->ngaySinh = $ngaySinh;
            return $this;
        }

        public function getDvCongTac()
        {
            return $this->dvCongTac;
        }

        public function setDvCongTac($dvCongTac): self
        {
            $this->dvCongTac = $dvCongTac;
            return $this;
        }
        abstract function tinhThuong();
    }

    class GiangVien extends CanBo
    {
        protected $ngayVeTruong, $hocVi, $congTrinhNghienCuu;
        const DON_GIA_BAI_BAO = 10000000;
        public function getNgayVeTruong()
        {
            return $this->ngayVeTruong;
        }
        public function setNgayVeTruong($ngayVeTruong): self
        {
            $this->ngayVeTruong = $ngayVeTruong;
            return $this;
        }
        public function getHocVi()
        {
            return $this->hocVi;
        }
        public function setHocVi($hocVi): self
        {
            $this->hocVi = $hocVi;
            return $this;
        }

        public function getCongTrinhNghienCuu()
        {
            return $this->congTrinhNghienCuu;
        }
        public function setCongTrinhNghienCuu($congTrinhNghienCuu)
        {
            $this->congTrinhNghienCuu = $congTrinhNghienCuu;

            return $this;
        }
        public function tinhThuong()
        {
            if (($this->hocVi == "Ths" || $this->hocVi == "TS") && $this->congTrinhNghienCuu <= 2) {
                return self::DON_GIA_BAI_BAO * $$this->congTrinhNghienCuu;
            }
            if (($this->hocVi == "PGS" || $this->hocVi == "TS") && $this->congTrinhNghienCuu >= 3) {
                return self::DON_GIA_BAI_BAO * $$this->congTrinhNghienCuu * 1.5;
            }
        }
    }

    class ChuyenVien extends CanBo
    {
        protected $chucVu, $soSangKienCaiTien;

        public function getchucVu()
        {
            return $this->chucVu;
        }
        public function setchucVu($chucVu): self
        {
            $this->chucVu = $chucVu;
            return $this;
        }
        public function getSoSangKienCaiTien()
        {
            return $this->soSangKienCaiTien;
        }
        public function setSoSangKienCaiTien($soSangKienCaiTien): self
        {
            $this->soSangKienCaiTien = $soSangKienCaiTien;
            return $this;
        }

        public function tinhThuong()
        {

            if ($this->soSangKienCaiTien > 0 && $this->chucVu == "TruongPhong") {
                return 2000000 * $this->soSangKienCaiTien + 500000;
            }
            if ($this->soSangKienCaiTien > 0 && $this->chucVu == "PhoPhong") {
                return 2000000 * $this->soSangKienCaiTien + 300000;
            }
            if ($this->soSangKienCaiTien > 0 && $this->chucVu == "ThuKy") {
                return 2000000 * $this->soSangKienCaiTien + 100000;
            }
        }
    }
    // Họ Tên
    if (isset($_POST['hoTen']))
        $hoten = $_POST['hoTen'];
    else
        $hoten = "";
    // Mã Số
    if (isset($_POST['ms']))
        $ms = $_POST['ms'];
    else
        $ms = "";
    // Ngày Sinh
    if (isset($_POST['ngaysinh']))
        $ngaySinh = $_POST['ngaysinh'];
    else
        $ngaySinh = "";
    // Đơn vị công tác
    if (isset($_POST['DVCT']))
        $dvCongTac = $_POST['DVCT'];
    else
        $dvCongTac = "";
    // Công trình nghiên cứu
    if (isset($_POST['congTrinhNghienCuu']))
        $congTrinhNghienCuu = $_POST['congTrinhNghienCuu'];
    else
        $congTrinhNghienCuu = "";
    // <!-- Số Sáng kiến cải tiến -->
    
    if (isset($_POST['soSangKienCaiTien']))
        $soSangKienCaiTien = $_POST['soSangKienCaiTien'];
    else
        $soSangKienCaiTien = "";


    if (isset($_POST['nut'])) {
        if (isset($_POST['ChucVu']) == "TruongPhong") {
            echo $kq = "Mã Số: " . $ms . "\n"
                . "Họ Tên: " . $hoten . "\n"
                . "Ngày Sinh" . $ngaySinh . "\n"
                . "Đơn vị công tác" . $dvCongTac . "\n"
                . "Chức vụ: Trưởng Phòng" . "\n"
                . "Công Trình Nghiên Cứu: " . $congTrinhNghienCuu;
        }
    }

    ?>

    <!-- Lop CanBo, GiangVien, ChuyenVien -->

    <form action="" method="post">
        <fieldset>
            <legend>QUẢN LÝ CÁN BỘ</legend>
            <table border='1'>
                <tr>
                    <td>Mã Số: </td>
                    <td><input type="text" name="ms" value="<?php echo $ms; ?>"></td>
                </tr>
                <tr>
                    <td>Họ và tên: </td>
                    <td><input type="text" name="hoTen" value="<?php echo $hoten; ?>"></td>
                </tr>
                <tr>
                    <td>Giới tính: </td>
                    <td>
                        <input type="radio" name="gt" value="nam" checked="true" <?php if (isset($_POST['gt']) && ($_POST['gt']) == "nam")
                            echo 'checked="checked"' ?> />Nam
                            <input type="radio" name="gt" value="nu" <?php if (isset($_POST['gt']) && ($_POST['gt']) == "nu")
                            echo 'checked="checked"' ?> />Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày Sinh</td>
                        <td><input type="text" name="ngaysinh" size="50" value="<?php echo $ngaySinh; ?> " /></td>
                </tr>
                <tr>
                    <td>Đơn vị công tác</td>
                    <td><input type="text" name="DVCT" value="<?php echo $dvCongTac; ?>"></td>
                </tr>
                <tr>
                    <td>Trình độ</td>
                    <td>
                        <input type="radio" name="trinhDo" value="ThS <?php echo $chucVu ?>" checked="true" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "ThS")
                               echo 'checked="checked"' ?> />Thạc
                            Sĩ
                            <input type="radio" name="ChucVu" value="TS<?php echo $chucVu ?>" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "TS")
                                   echo 'checked="checked"' ?> />Tiến
                            Sĩ
                            <input type="radio" name="ChucVu" value="PGS<?php echo $chucVu ?>" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "PGS")
                                   echo 'checked="checked"' ?> />Phó
                            Giáo Sư
                        </td>
                    </tr>
                    <tr>
                        <td>Chức vụ</td>
                        <td>
                            <input type="radio" name="ChucVu" value="TruongPhong <?php echo $chucVu ?>" checked="true" <?php if (isset($_POST['ChucVu']) && ($_POST['ChucVu']) == "TruongPhong")
                                   echo 'checked="checked"' ?> />Trưởng Phòng
                            <input type="radio" name="ChucVu" value="PhoPhong<?php echo $chucVu ?>" <?php if (isset($_POST['ChucVu']) && ($_POST['ChucVu']) == "PhoPhong")
                                   echo 'checked="checked"' ?> />Phó Phòng
                            <input type="radio" name="ChucVu" value="ThuKi<?php echo $chucVu ?>" <?php if (isset($_POST['ChucVu']) && ($_POST['ChucVu']) == "ThuKi")
                                   echo 'checked="checked"' ?> />Thư
                            Kí
                        </td>
                    </tr>
                    <tr>
                        <td>Công Trình Nghiên Cứu</td>
                        <td><input type="text" name="congTrinhNghienCuu" value="<?php echo $congTrinhNghienCuu ?>"></td>
                </tr>
                <tr>
                    <td>Số Sáng Kiến Cải Tiến</td>
                    <td><input type="text" name="soSangKienCaiTien" value="<?php echo $soSangKienCaiTien ?>"></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><input type="submit" name="nut" size="10" value="   Lưu Cán Bộ   " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="xuat" id="" cols="50" rows="10"><?php echo $kq; ?></textarea>
                    </td>

                    <td></td>
                </tr>

            </table>
        </fieldset>
    </form>
</body>

</html>