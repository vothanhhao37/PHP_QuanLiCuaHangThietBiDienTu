<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <style>
              
              .pheptinh {
                     border: 1px solid black;
                     width: 500px;
                     padding: 20px;
                     margin-bottom: 15px;
              }

              .phanso {
                     width: 500px;
                     position: relative;
              }

              .phanso div {
                     margin: 15px 0;
              }

              .te {
                     position: absolute;
                     top: 62px;
                     left: 10px;
                     background-color: white;
              }

              .phanso input {
                     width: 100px;
              }
              h3 {
                     color: violet;
              }
       </style>
</head>

<body>
       <?php
       $a = $b = $c = $d =$e= "";
       $check = true;
       if (!empty($_POST['tuso1'])) {
              $a = trim($_POST['tuso1']);
       } else
              $check = false;
       if (!empty($_POST['mauso1'])) {
              $b = trim($_POST['mauso1']);
       } else
              $check = false;
       if (!empty($_POST['tuso2'])) {
              $c = trim($_POST['tuso2']);
       } else
              $check = false;
       if (!empty($_POST['mauso2'])) {
              $d = trim($_POST['mauso2']);
       } else
              $check = false;
       if (!empty($_POST['pheptinh'])) {
              $e = trim($_POST['pheptinh']);
       } else
              $check = false;
       ?>
       
       <h3>Chọn các phép tính trên phân số</h3>
       <form action="" method="POST">
              <div class="phanso">
                     <div>
                            <span>Nhập phân số thứ 1: Tử số: </span><input type="text" name="tuso1"
                                   value="<?php echo $a; ?>"><span>Mẫu số:
                            </span><input type="text" name="mauso1" value="<?php echo $b; ?>">
                     </div>
                     <div>
                            <span>Nhập phân số thứ 2: Tử số: </span><input type="text" name="tuso2"
                                   value="<?php echo $c; ?>"><span>Mẫu số:
                            </span><input type="text" name="mauso2" value="<?php echo $d; ?>">
                     </div>
                     <span class="te">Chọn phép tính</span>
              </div>

              <div class="pheptinh">
                     <input type="radio" name="pheptinh" value="+" <?php if($e=='+'){?>checked <?php } ?>>Cộng
                     <input type="radio" name="pheptinh" value="-" <?php if($e=='-'){?>checked <?php } ?>>Trừ
                     <input type="radio" name="pheptinh" value="*" <?php if($e=='*'){?>checked <?php } ?>>Nhân
                     <input type="radio" name="pheptinh" value="/" <?php if($e=='/'){?>checked <?php } ?>>Chia
              </div>
              <input type="submit" name="kq" value="Kết quả" style="margin-bottom: 10px">
       </form>
       <?php
       class PhanSo
       {
              private $tuSo;
              private $mauSo;
              function __construct($tuSo, $mauSo)
              {
                     $this->tuSo = $tuSo;
                     $this->mauSo = $mauSo;
              }
              function Cong(PhanSo $p)
              {
                     if ($this->mauSo == $p->mauSo) {
                            $tu = $this->tuSo + $p->tuSo;
                            $kq = $this->toiGian($tu, $this->mauSo);
                            return $kq;
                     } else {
                            $mau = (int) $this->mauSo * (int) $p->mauSo;
                            $tu = $this->tuSo * $p->mauSo + $this->mauSo * $p->tuSo;
                            $kq = $this->toiGian($tu, $mau);
                            return $kq;
                     }
              }
              function Tru(PhanSo $p)
              {
                     if ($this->mauSo == $p->mauSo) {
                            $tu = $this->tuSo - $p->tuSo;
                            $kq = $this->toiGian($tu, $this->mauSo);
                            return $kq;
                     } else {
                            $mau = (int) $this->mauSo * (int) $p->mauSo;
                            $tu = $this->tuSo * $p->mauSo - $this->mauSo * $p->tuSo;
                            $kq = $this->toiGian($tu, $mau);
                            return $kq;
                     }
              }
              function Nhan(PhanSo $p)
              {
                     $tu = $this->tuSo * $p->tuSo;
                     $mau = $this->mauSo * $p->mauSo;
                     $kq = $this->toiGian($tu, $mau);
                     return $kq;
              }
              function Chia(PhanSo $p)
              {
                     $tu = $this->tuSo * $p->mauSo;
                     $mau = $this->mauSo * $p->tuSo;
                     $kq = $this->toiGian($tu, $mau);
                     return $kq;
              }
              function USCLN($a, $b)
              {
                     if ($b == 0) {
                            return $a;
                     } else {
                            return $this->USCLN($b, $a % $b);
                     }
              }
              function toiGian($a, $b)
              {
                     $ucln = $this->USCLN($a, $b);
                     $a = $a / $ucln;
                     $b = $b / $ucln;
                     return $a . '/' . $b;
              }
       }

       
       if (isset($_POST['kq']) && $check == true) {
              if ($e == '+') {
                     $ps1 = new PhanSo($a, $b);
                     $ps2 = new PhanSo($c, $d);
                     $kq = $ps1->Cong($ps2);
                     echo "Phép cộng là: " . $a.'/'.$b.' + '.$c.'/'.$d.' = '.$kq;
              } elseif ($e == '-') {
                     $ps1 = new PhanSo($a, $b);
                     $ps2 = new PhanSo($c, $d);
                     $kq = $ps1->Tru($ps2);
                     echo "Phép trừ là: " . $a.'/'.$b.' - '.$c.'/'.$d.' = '.$kq;
              } elseif ($e == '*') {
                     $ps1 = new PhanSo($a, $b);
                     $ps2 = new PhanSo($c, $d);
                     $kq = $ps1->Nhan($ps2);
                     echo "Phép nhân là: " . $a.'/'.$b.' * '.$c.'/'.$d.' = '.$kq;
              } else {
                     $ps1 = new PhanSo($a, $b);
                     $ps2 = new PhanSo($c, $d);
                     $kq = $ps1->chia($ps2);
                     echo "Phép chia là: " . $a.'/'.$b.' / '.$c.'/'.$d.' = '.$kq;
              }

       }

       ?>

</body>

</html>