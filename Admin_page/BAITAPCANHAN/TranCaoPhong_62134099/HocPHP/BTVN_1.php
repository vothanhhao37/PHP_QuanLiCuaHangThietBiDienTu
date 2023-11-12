<html>
       <head>

       </head>
       <body>
              <?php
              $n = rand(-50,50);
              function isSoDuong($a){
                     if($a >0) return true;
                     return false;
              }
              if(isSoDuong($n)==true) echo "$n là số dương <br>";
              else{
                     echo "$n là số âm <br>";
                     $n = abs($n);
              }
              $arr =array();
              for($i=0;$i<$n;$i++){
                     $arr[$i] = rand(-100,100);
              }
              echo "Mảng vừa tạo có $n phần tử là <br>";
              for($i=0;$i<$n;$i++){
                     echo "$arr[$i]   ";
              }
              $tong=0;
              for($i=1;$i<$n;$i+=2)
                     $tong+=$arr[$i];
              echo "<br>Tổng các phần tử ở vị trí lẻ: $tong";
              ?>
       </body>
</html>