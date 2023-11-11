<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

       <title>Mang tim kiem va thay the</title>

       <style type="text/css">
              table {

                     color: #ffff00;

                     background-color: gray;

              }

              table th {

                     background-color: blue;

                     font-style: vni-times;

                     color: yellow;

              }
       </style>

</head>

<body>
       <?php
       function taoMang($soPT){
              $arr = array();
              for($i=0;$i<$soPT;$i++){
                     $arr[$i] = rand(-1000,1000);
              }
              return $arr;
       }
       function hienThiMang($arr){
              for($i=0;$i<count($arr);$i++)
                     echo "$arr[$i]   ";
       }
       function demChan($arr){
              $dem=0;
              for($i=0;$i<count($arr);$i++)
                     if($arr[$i]%2==0)
                            $dem++;
              return $dem;
       }
       function dem($arr){
              $tam = 0;
              for($i=0;$i<count($arr);$i++)
                     if($arr[$i]<100)
                            $tam++;
              return $tam;
       }
       function tongAm($arr){
              $tong = 0;
              for($i=0;$i<count($arr);$i++)
                     if($arr[$i]<0)
                            $tong+=$arr[$i];
              return $tong;
       }
       function so($a){
              if(abs($a)>99){
                     $tam = $a/10;
                     $tam = $tam%10;
                     if($tam==0) return true;
              }
              
              return false;
       }
       function caue($arr){
              $kq = "";
              for($i=0;$i<count($arr);$i++)
                     if(so($arr[$i])==true)
                            $kq.="$i ";
              return $kq;
       }
       function sapXep(&$arr){
              for($i=0;$i<count($arr);$i++)
                     for($j=$i+1;$j<count($arr);$j++)
                            if($arr[$i]>$arr[$j]){
                                   $tam = $arr[$i];
                                   $arr[$i]=$arr[$j];
                                   $arr[$j]=$tam;
                            }
       }
       if (isset($_POST['n']))
              $n = $_POST['n'];
       else
              $n = '';
       $arr = array();
       for ($i = 0; $i < $n; $i++) {
              $arr[$i] = rand(-100, 100);
       }
       
       if(isset($_POST['n']))
              $n = trim($_POST['n']);
       else   $n=0;

       $kq="";
       if(isset($_POST['tinh'])&& $n>0){
              $a = taoMang($n);
              $str = implode('   ', $a);
              $kq="Mảng được tạo ra là:" .$str;
              $kq.="\nSố phần tử chẵn trong mảng là: ";
              $kq.=demChan($a);
              $kq.="\nSố phần tử nhỏ hơn 100 trong mảng là: ";
              $kq.=dem($a);
              $kq.="\nTổng các phần tử là số âm: ";
              $kq.=tongAm($a);
              $kq.="\nVị trí các thành phần trong mảng có chữ số kề cuối là 0: ";
              $kq.=caue($a);
              sapXep($a);
              $str = implode('   ', $a);
              $kq.="\nMảng được sắp xếp là:" .$str;
       }
       ?>
       <form action="" method="post">

              <table border="0" cellpadding="0">

                     <th colspan="2">
                            <h2>Một số thao tác trên mảng</h2>
                     </th>

                     <tr>

                            <td>Nhập n:</td>
                            <td><input type="text" name="n" size="30" value="<?php echo $n; ?> " /></td>
                     </tr>

                     <tr>

                            <td colspan="2" style="text-align: center;"><input type="submit" name="tinh" size="20"
                                          value="   Xử lý  " /></td>
                     </tr>
                     <tr>
                            <td colspan="2"><textarea name="ketqua" id="" cols="70" rows="10"><?php echo $kq; ?></textarea></td>
                     </tr>



              </table>

       </form>
</body>

</html>