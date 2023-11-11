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
       function taoMang($n){
              $arr = array();
              for($i=0;$i<$n;$i++){
                     $arr[$i] = rand(0,20);
              }
              return $arr;
       }
       function xuatMang($arr, &$str){
              $str = implode(" ",$arr);
       }
       function tongMang($arr, $n){
              $tong = 0;
              for($i=0;$i<$n;$i++){
                     $tong += $arr[$i];
              }
              return $tong;
       }
       function min_array($arr, $n){
              $min = $arr[0];
              for($i=1;$i<$n;$i++){
                     if($min >$arr[$i])
                            $min = $arr[$i];
              }
              return $min;
       }
       function max_array($arr, $n){
              $max = $arr[0];
              for($i=1;$i<$n;$i++){
                     if($max <$arr[$i])
                            $max = $arr[$i];
              }
              return $max;
       }
       $n = "";
       $mang='';$max='';$min='';
       $tong = 0;
       if (isset($_POST['n'])) {
              $n = $_POST['n'];
       }
       if (isset($_POST['xuly']) && $n!='') {
              $arr= taoMang($n);
              xuatMang($arr, $mang);
              $max = max_array($arr, $n);
              $min = min_array($arr, $n);
              $tong = tongMang($arr, $n);  
       }
       

       ?>
       <form action="" method="POST">
              <table>
                     <tr>
                            <h3>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h3>
                     </tr>
                     <tbody>
                            <tr class="head">
                                   <td>Nhập số phần tử: </td>
                                   <td><input type="text" name="n"  value="<?php echo $n; ?>"></td>
                            </tr>
                            <tr class="head">
                                   <td></td>
                                   <td><input type="submit" name="xuly" value="Phát sinh và tính toán"></td>
                            </tr>
                            
                            <tr>
                                   <td>Mảng: </td>
                                   <td><input type="text" value="<?php echo $mang; ?>"></td>
                            </tr>
                            <tr>
                                   <td>GTLN (MAX) trong mảng: </td>
                                   <td><input type="text" disabled value="<?php echo $max; ?>"></td>
                            </tr>
                            <tr>
                                   <td>GTNN (MIN) trong mảng: </td>
                                   <td><input type="text" disabled value="<?php echo $min; ?>"></td>
                            </tr>
                            <tr>
                                   <td>Tổng mảng: </td>
                                   <td><input type="text" disabled value="<?php echo $tong; ?>"></td>
                            </tr>
                            <tr>
                                   <td colspan="2">Ghi chú: Các phần tử trong mảng sẽ có giá trị từ 0 đến 20</td>
                            </tr>

                     </tbody>
              </table>
       </form>
</body>

</html>