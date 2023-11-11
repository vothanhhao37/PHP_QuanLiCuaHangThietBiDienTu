<html>

<head>
       <style>
              form {
              }
              table {
                     width: 50%;
                     text-align: center;
                     margin-left: 200px;
                     background: #8ed345;
              }
       </style>
</head>

<body>
       <?php
       if (isset($_POST['m']))
              $m = $_POST['m'];
       else
              $m = 0;
       if (isset($_POST['n']))
              $n = $_POST['n'];
       else
              $n = 0;
       if(($m<2 || $m>5) || ($n<2 || $n>5)){
              $ketqua="m và n không hợp lệ";
       }
       else{
              $ketqua = "";
              $arr = array();
              for ($i = 0; $i < $m; $i++) {
                     for ($j = 0; $j < $n; $j++) {
                            $x = rand(-100, 100);
                            $arr[$i][$j] = $x;
                     }
              }          
              for($i=0;$i<$m;$i++){       
                     $ketqua .= implode(" ", $arr[$i]). "&#13;&#10;";
              }
              $ketqua.= "Ma trận sau khi thay đổi: &#13;&#10;";
              for($i=0;$i<$m;$i++)
                     for($j=0;$j<$n;$j++){
                            if($arr[$i][$j] < 0) $arr[$i][$j]=0;
              }
              for($i=0;$i<$m;$i++){       
                     $ketqua .= implode(" ", $arr[$i]). "&#13;&#10;";
              }
       }
              
      
       ?>

       <form action="" method="post">
              <table>
                     <tr>
                            <td>Nhập m <input type="text" name="m" value="<?php echo $m ?>"></td>
                     </tr>
                     <tr>
                            <td>Nhập n <input type="text" name="n" value="<?php echo $n ?>"></td>
                     </tr>
                     <tr>
                            <td><input type="submit" name="xuly" value="Xử lý"></td>
                     </tr>
                     <tr>
                            <td>
                            Kết quả: <br>
                                   <textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua; ?></textarea>
                            </td>
                     </tr>
              </table>


              
       </form>
</body>

</html>