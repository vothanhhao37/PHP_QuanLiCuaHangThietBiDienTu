<html>

<head>
       <style>
              * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-align: justify;

}
              form {
                     
                     width: 600px;
                     text-align: center;
                     border: 1px solid black
              }

              h3 {
                     background-color: #b31db3;
                     color: white;
                     padding: 10px 0;
                     text-align: center;
                     box-sizing: border-box-box;
              }
              .head {
                     
                     background-color: #e7a6c5;
              }
              table{
                     width: 100%;
                     
              }
              input[type="text"] {
                     width: 300px;
              }
       </style>
</head>

<body>
       <?php
       function thay_the($mang, $cu, $moi){
              $mangmoi = $mang;
              for($i=0;$i<count($mangmoi);$i++){
                     if($mangmoi[$i]==$cu)
                            $mangmoi[$i]=$moi;
              }
              return $mangmoi;
       }
       function xuatMang($arr){
              $mang = implode("  ",$arr);
              return $mang;
       }
       $chuoi = "";
       $cu = '';
       $moi='';
       if (isset($_POST['chuoi'])) {
              $chuoi = $_POST['chuoi'];
       }
       if (isset($_POST['cu'])) {
              $cu = $_POST['cu'];
       }
       if (isset($_POST['moi'])) {
              $moi = $_POST['moi'];
       }
       if (isset($_POST['thaythe']) && $chuoi!='') {
              $mang =array();
              $mang= explode(",",$chuoi);
              $mangcu = xuatMang($mang);
              $mangmoi=thay_the($mang,$cu,$moi);
              $mangmoi=xuatMang($mangmoi);
              
       }

       

       ?>
       <form action="" method="POST">
              <table>
                     <tr>
                            <h3>THAY THẾ</h3>
                     </tr>
                     <tbody>
                            <tr class="head">
                                   <td>Nhập các phần tử: </td>
                                   <td><input type="text" name="chuoi"  value="<?php echo $chuoi; ?>"></td>
                            </tr>
                            <tr class="head">
                                   <td>Giá trị cần thay thế</td>
                                   <td><input type="text" name="cu" value="<?php echo $cu ?>"></td>
                            </tr>
                            <tr class="head">
                                   <td>Giá trị thay thế</td>
                                   <td><input type="text" name="moi" value="<?php echo $moi ?>"></td>
                            </tr>
                            <tr class="head">
                                   <td></td>
                                   <td><input type="submit" name="thaythe" value="Thay thế"></td>
                            </tr>
                            
                            <tr>
                                   <td>Mảng cũ: </td>
                                   <td><input style="background-color: #f5bfe5d6;" type="text" disabled value="<?php echo $mangcu; ?>"></td>
                            </tr>
                            <tr>
                                   <td>Mảng sau khi thay thế: </td>
                                   <td><input style="background-color: #f5bfe5d6;" type="text" disabled value="<?php echo $mangmoi; ?>"></td>
                            </tr>
                            <tr>
                                   <td colspan="2" style="text-align: center; background-color: violet" >(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
                            </tr>

                     </tbody>
              </table>
       </form>
</body>

</html>