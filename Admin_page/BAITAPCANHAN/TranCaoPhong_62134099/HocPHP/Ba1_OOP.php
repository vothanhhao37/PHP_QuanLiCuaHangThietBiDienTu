<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <style>
              * {
                     margin: 0;
                     padding: 0;
                     box-sizing: border-box;
              }
              .header td {
                     text-align: center;
              }

              tbody td {
                     background-color: yellowgreen;
              }

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
       $hoTen=$diaChi=$gioiTinh=$trinhDo=$lopHoc=$nganhHoc=$kq="";
       if(!empty($_POST['hoten'])){
              $hoTen = trim($_POST['hoten']);
       }
       if(!empty($_POST['diachi'])){
              $diaChi = trim($_POST['diachi']);
       }
       if(!empty($_POST['gioitinh'])){
              $gioiTinh = $_POST['gioitinh'];
       }
       if(!empty($_POST['trinhdo'])){
              $trinhDo = $_POST['trinhdo'];
       }
       if(!empty($_POST['lophoc'])){
              $lopHoc = $_POST['lophoc'];
       }
       if(!empty($_POST['nganhhoc'])){
              $nganhHoc = $_POST['nganhhoc'];
       }

       if(isset($_POST['tinhGV'])){
              $gv = new GiangVien();
              $gv->set($trinhDo);
              $luong = $gv->tinhLuong();
              $kq = 'Lương: '.$luong;
       }
       if(isset($_POST['tinhSV'])){
              $sv = new SinhVien($hoTen, $diaChi,$gioiTinh, $lopHoc, $nganhHoc);
              $kq =$sv->xuat();
       }
       ?>
       <form action="" method="POST">
              <table>
                     <thead class="header">
                            <tr>
                                   <td colspan="2">
                                          <h3>NHẬP THÔNG TIN</h3>
                                   </td>
                            </tr>
                            <tr>
                                   <td><input type="submit" value="Giảng Viên" name="giangvien"></td>
                                   <td><input type="submit" value="Sinh Viên" name="sinhvien"></td>

                            </tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td>Họ và tên: <input type="text" name="hoten" value="<?php echo $hoTen; ?>"></td>
                                   <td>Địa chỉ: <input type="text" name="diachi" value="<?php echo $diaChi; ?>"></td>
                            </tr>
                            <tr>
                                   <td>Giới tính: <input type="radio" name="gioitinh" value="Nam" <?php if (isset($_POST['gioitinh']) && $_POST['gioitinh'] == 'Nam') { ?>checked
                                                 <?php } ?>>Nam</td>
                                   <td>
                                   <input type="radio" name="gioitinh" value="Nu" <?php if (isset($_POST['gioitinh']) && $_POST['gioitinh'] == 'Nu') { ?>checked
                                                 <?php } ?>>Nữ
                                   </td>
                            </tr>
                            <?php
                            if (isset($_POST['sinhvien']) || isset($_POST['tinhSV'])) {?>
                            <tr>
                                   <td>Lớp học: <input type="text" name="lophoc" value="<?php echo $lopHoc; ?>"></td>
                                   <td>Ngành học: <input type="text" name="nganhhoc" value="<?php echo $nganhHoc; ?>"></td>
                            </tr>
                            <tr>
                                   <td style="text-align: center; padding: 5px;" colspan="2"><input type="submit" name="tinhSV" value="Tính"></td>
                            </tr> <?php
                            }
                            if (isset($_POST['giangvien']) || isset($_POST['tinhGV'])) {?>
                                   <tr>
                                   <td>Trình độ: <input type="text" name="trinhdo" value="<?php echo $trinhDo; ?>"></td>
                                   <td>Lương cơ bản: <input type="text" name="luongCB" value="1500000" disabled></td>
                            </tr>
                            <tr>
                                   <td style="text-align: center; padding: 5px;" colspan="2"><input type="submit" name="tinhGV" value="Tính"></td>
                            </tr> <?php
                            }
                            ?>
                            <tr>
                                   <td colspan="2">
                                          <textarea name="" cols="70" rows="3"><?php echo $kq; ?></textarea>
                                   </td>
                            </tr>


                     </tbody>
              </table>
       </form>
</body>

</html>

<?php
abstract class Nguoi
{
       protected $hoTen, $diaChi, $gioiTinh;
}
class SinhVien extends Nguoi
{
       private $lopHoc, $nganhHoc;
       function __construct($hoTen, $diaChi, $gioiTinh, $lopHoc='62CNTT1',$nganhHoc='CNTT'){
              $this->hoTen = $hoTen;
              $this->diaChi = $diaChi;
              $this->gioiTinh = $gioiTinh;
              $this->lopHoc = $lopHoc;
              $this->nganhHoc = $nganhHoc;
       }
       function tinhDiemThuong()
       {
              if ($this->nganhHoc == 'CNTT')
                     return 1;
              elseif ($this->nganhHoc == 'KT')
                     return 1.5;
              else
                     return 0;
       }
       function xuat(){
              return $this->hoTen.'--'.$this->diaChi.'--'.$this->gioiTinh.'--'.$this->lopHoc.'--'.$this->nganhHoc."\n".
              'Điểm thưởng: '.$this->tinhDiemThuong();
       }
}
class GiangVien extends Nguoi
{
       private $trinhDo;
       const luongCB = 1500000;
       function set($trinhDo){
              $this->trinhDo = $trinhDo;
       }
       function tinhLuong()
       {
              if ($this->trinhDo == 'Cu nhan')
                     return self::luongCB * 2.34;
              elseif ($this->trinhDo == 'Thac si')
                     return self::luongCB * 3.67;
              else
                     return self::luongCB * 5.66;
       }
}

?>