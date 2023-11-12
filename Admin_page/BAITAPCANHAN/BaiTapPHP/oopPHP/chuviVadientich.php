<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tinh chu vi va dien tich</title>

    <style>
        fieldset {

            background-color: #eeeeee;

        }



        legend {

            background-color: gray;

            color: white;

            padding: 5px 10px;

        }



        input {

            margin: 5px;

        }
    </style>

</head>

<body>

    <?php

    abstract class Hinh
    {

        protected $ten, $dodai;
        protected $canh1, $canh2, $canh3;


        public function setTen($ten)
        {

            $this->ten = $ten;

        }

        public function getTen()
        {

            return $this->ten;

        }

        public function setDodai($doDai)
        {

            $this->dodai = $doDai;

        }

        public function getDodai()
        {

            return $this->dodai;

        }

        abstract public function tinh_CV();

        abstract public function tinh_DT();



        public function getCanh1()
        {
            return $this->canh1;
        }


        public function setCanh1($canh1): self
        {
            $this->canh1 = $canh1;
            return $this;
        }


        public function getCanh2()
        {
            return $this->canh2;
        }


        public function setCanh2($canh2): self
        {
            $this->canh2 = $canh2;
            return $this;
        }


        public function getCanh3()
        {
            return $this->canh3;
        }


        public function setCanh3($canh3): self
        {
            $this->canh3 = $canh3;
            return $this;
        }
    }

    class HinhTron extends Hinh
    {

        const PI = 3.14;

        function tinh_CV()
        {

            return $this->dodai * 2 * self::PI;

        }

        function tinh_DT()
        {

            return pow($this->dodai, 2) * self::PI;

        }

    }

    class HinhVuong extends Hinh
    {

        public function tinh_CV()
        {

            return $this->dodai * 4;

        }

        public function tinh_DT()
        {

            return pow($this->dodai, 2);

        }

    }

    class hinhChuNhat extends Hinh
    {
        public function tinh_CV()
        {
            return ($this->canh1 + $this->canh2) / 2;
        }

        public function tinh_DT()
        {
            return $this->canh1 * $this->canh2;
        }
    }

    class tamGiacThuong extends Hinh
    {
        public function tinh_CV()
        {
            if ($this->canh1 + $this->canh2 > $this->canh3 && $this->canh1 + $this->canh3 > $this->canh2 && $this->canh2 + $this->canh3 > $this->canh1) {
                return ($this->canh1 + $this->canh2 + $this->canh3);
            } else
                return "Độ dài không hợp lệ";
        }
        public function tinh_DT()
        {
            $p = ($this->canh1 + $this->canh2 + $this->canh3) / 2;
            if ($this->canh1 + $this->canh2 > $this->canh3 && $this->canh1 + $this->canh3 > $this->canh2 && $this->canh2 + $this->canh3 > $this->canh1) {
                return sqrt($p * ($p - $this->canh1) * ($p - $this->canh2) * ($p - $this->canh3)); // cong thuc herong
            } else
                return "Độ dài ko hợp lệ";
        }
    }

    class tamGiacDeu extends Hinh
    {
        public function tinh_CV()
        {
            return ($this->canh1 * 3);
        }
        public function tinh_DT()
        {
            return pow($this->canh1, 2) * sqrt(3) / 4;
        }
    }

    // ----------------------------------------------------------------//
    $str = NULL;

    if (isset($_POST['tinh'])) {

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") {

            $hv = new HinhVuong();

            $hv->setTen($_POST['ten']);

            $hv->setDodai($_POST['dodai']);

            $str = "Diện tích hình vuông " . $hv->getTen() . " là : " . $hv->tinh_DT() . " \n" .

                "Chu vi của hình vuông " . $hv->getTen() . " là : " . $hv->tinh_CV();

        }

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") {

            $ht = new HinhTron();

            $ht->setTen($_POST['ten']);

            $ht->setDodai($_POST['dodai']);

            $str = "Diện tích của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_DT() . " \n" .

                "Chu vi của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_CV();

        }

    }

    ?>

    <form action="" method="post">

        <fieldset>

            <legend>Tính chu vi và diện tích các hình học đơn giản</legend>

            <table border='0'>

                <tr>
                    <td>Chọn hình</td>
                    <td><input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv")
                        echo 'checked="checked"' ?> />Hình vuông

                            <input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht")
                        echo 'checked="checked"' ?> />Hình tròn
                            <input type="radio" name="hinh" value="htg" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htg")
                        echo 'checked="checked"' ?> />Hình tam giác
                            <input type="radio" name="hinh" value="tgd" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "tgd")
                        echo 'checked="checked"' ?> />Hình tam giác đều
                            <input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn")
                        echo 'checked="checked"' ?> />hình chữ nhật

                        </td>
                    </tr>

                    <tr>
                        <td>Nhập tên:</td>
                        <td><input type="text" name="ten" value="<?php if (isset($_POST['ten']))
                        echo $_POST['ten']; ?>" />
                    </td>
                </tr>

                <tr>
                    <td>Nhập độ dài:</td>
                    <td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai']))
                        echo $_POST['dodai']; ?>" /></td>
                </tr>

                <tr>
                    <td>Kết quả:</td>

                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH" /></td>
                </tr>

            </table>

        </fieldset>

    </form>



</body>

</html>