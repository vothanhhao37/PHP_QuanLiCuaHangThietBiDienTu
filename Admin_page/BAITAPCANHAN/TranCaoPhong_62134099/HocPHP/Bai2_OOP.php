<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <style>
              tbody td {background-color: yellowgreen;}
              h3 {
                     text-align: center;
              }
              table {
                     border: solid 1px black;
              }
       </style>
</head>

<body>
       <?php
       abstract class NhanVien{
              protected $hoTen, $gioiTinh, $ngayVaoLam, $hsLuong, $soCon, $soNamLamViec;
              const luongCB = 1350000;
              abstract public function tinhLuong();
              abstract public function tinhTroCap();
              public function tinhThuong(){
                     return $this->soNamLamViec*1000000;
              }

       }
       class NhanVienVP extends NhanVien{
              public $soNgayVang;
              const dmVang = 3;
              const donGiaPhat = 2000000;
              function tinhTienPhat() {
                     if($this->soNgayVang > self::dmVang){
                            return $this->soNgayVang * self::donGiaPhat;
                     }
                     return 0;
              }
              function tinhTroCap(){
                     if($this->gioiTinh =="Nữ"){
                            return 200000* $this->soCon * 1.5;
                     }
                     return 200000*$this->soCon;
              }
              function tinhLuong(){
                     return (int)self::luongCB * (int)$this->hsLuong - (int)$this->tinhTienPhat();
              }
              function __construct ($hoTen, $soCon, $ngaySinh, $ngayVaoLam, $gioiTinh, $hsLuong, $soNgayVang, $soSanPham){
                     $this->hoTen = $hoTen;
                     $this->soCon = $soCon;
                     $this->ngaySinh = $ngaySinh;
                     $this->ngayVaoLam = $ngayVaoLam;
                     $this->gioiTinh = $gioiTinh;
                     $this->hsLuong = $hsLuong;
                     $this->soNgayVang = $soNgayVang;
                     $this->soSanPham = $soSanPham;

              }
       }
       class NhanVienSX extends NhanVien{
              const DINHMUCSP = 2;
              const DONGIASP = 20000;
              public $soSP;
              function tinhTroCap(){
                     return 120000*$this->soCon;
              }
              function tinhThuong(){
                     if($this->soSP > self::DINHMUCSP){
                            return ($this->soSP-self::DINHMUCSP)*self::DONGIASP*0.03;
                     }
                     return 0;
              }
              function tinhLuong(){

                     return self::DONGIASP* $this->soSP + $this->tinhThuong();
              }
       }
       $hoTen=$soCon=$ngaySinh=$ngayVaoLam=$hsLuong=$soNgayVang=$soSanPham=$tienLuong=$troCap=$tienThuong=$tienPhat=$thucLinh="";
       if(isset($_POST['hoten'])){
              $hoTen = trim($_POST['hoten']);
       }
       else {

       }
       if(isset($_POST['socon'])){
              $soCon = trim($_POST['socon']);
       }
       else {
              
       }
       if(isset($_POST['ngaysinh'])){
              $ngaySinh = trim($_POST['ngaysinh']);
       }
       else {
              
       }
       if(isset($_POST['ngayVaoLam'])){
              $ngayVaoLam = trim($_POST['ngayVaoLam']);
       }
       else {
              
       }
       if(isset($_POST['hsLuong'])){
              $hsLuong = trim($_POST['hsluong']);
       }
       else {
              
       }
       if(isset($_POST['songayvang'])){
              $soNgayVang = trim($_POST['songayvang']);
       }
       else {
              
       }
       if(isset($_POST['sosanpham'])){
              $soSanPham = trim($_POST['sosanpham']);
       }
       else {
              
       }
       if(isset($_POST['tinhluong'])){
              if($_POST['loaiNV']=="Văn phòng"){
                     $nv1 = new NhanVienVP($_POST['hoten'],$_POST['socon'],
                     $_POST['ngaysinh'],$_POST['ngayvaolam'],$_POST['gioitinh'],$_POST['hsluong'],$_POST['songayvang'],$_POST['sosanpham'],);
                     $tienLuong = $nv1->tinhLuong();
                     $troCap = $nv1->tinhTroCap();
                     $tienThuong = $nv1->tinhThuong();
                     $tienPhat = $nv1->tinhTienPhat();
              }

       }
       


       ?>
       <form action="" method="POST">
              <table>
                     <thead class="header">
                            <tr>
                                   <td colspan="4">
                                          <h3>QUẢN LÝ NHÂN VIÊN</h3>
                                   </td>
                            </tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td>Họ và tên</td>
                                   <td><input type="text" name="hoten" value="<?php echo $hoTen ?>"></td>
                                   <td>Số con</td>
                                   <td><input type="text" name="socon"  value="<?php echo $soCon ?>"></td>
                            </tr>
                            <tr>
                                   <td>Ngày sinh</td>
                                   <td><input type="date" name="ngaysinh"  value="<?php echo $ngaySinh ?>"></td>
                                   <td>Ngày vào làm:</td>
                                   <td><input type="date" name="ngayvaolam"  value="<?php echo $ngayVaoLam ?>"></td>
                            </tr>
                            <tr>
                                   <td>Giới tính:</td>
                                   <td>
                                          <input type="radio" name="gioitinh" value="Nam">Nam
                                          <input type="radio" name="gioitinh" value="Nữ">Nữ  
                                   </td>
                                   <td>Hệ số lương:</td>
                                   <td><input type="text" name="hsluong" value="<?php echo $hsLuong ?>"></td>
                            </tr>
                            <tr>
                                   <td>Loại nhân viên</td>
                                   <td>
                                          <input type="radio" name="loaiNV" value="Văn phòng">Văn phòng
                                   </td>
                                   <td colspan="2"><input type="radio" name="loaiNV" value="Sản xuất">Sản xuất</td>
                            </tr>
                            <tr>
                                   <td></td>
                                   <td>Số ngày vắng: <input type="text" name="songayvang" value="<?php echo $soNgayVang; ?>"></td>
                                   <td colspan="2">Số sản phẩm: <input type="text" name="sosanpham"  value="<?php echo $soSanPham ?>"></td>
                            </tr>
                            <tr>
                                   <td colspan="4" style="text-align: center"><input type="submit" name="tinhluong" value="Tính lương"></td>
                            </tr>
                            <tr>
                                   <td>Tiền lương:</td>
                                   <td><input type="text"disabled name="tienluong" value="<?php echo $tienLuong; ?>"></td>
                                   <td>Trợ cấp</td>
                                   <td><input type="text"disabled name="trocap" value="<?php echo $troCap; ?>"></td>
                            </tr>
                            <tr>
                                   <td>Tiền thưởng:</td>
                                   <td><input type="text"disabled name="tienthuong" value="<?php echo $tienThuong; ?>"></td>
                                   <td>Tiền phạt</td>
                                   <td><input type="text"disabled name="tienphat" value="<?php echo $tienPhat; ?>"></td>
                            </tr>
                            <tr>
                                   <td colspan="4" style="text-align: center">Thực lĩnh: <input type="text" disabled name="thuclinh" value="<?php echo $thucLinh ?>"></td>
                            </tr>
                     </tbody>
              </table>
       </form>
</body>

</html>