<html>

<head>
       <style>
              form {
                     background-color: aquamarine;
                     width: 30%;
                     text-align: center;
              }

              h3 {
                     background-color: greenyellow;
              }
       </style>
</head>

<body>
       <?php
       $a = "";
       $tong = 0;
       if (isset($_POST['input'])) {
              $a = $_POST['input'];
       }
       if (isset($_POST['tong']) && $a!='') {
              $arr = explode(",", $a);
              for ($i = 0; $i < count($arr); $i++)
                     $tong += $arr[$i];
       }

       ?>
       <form action="" method="POST">
              <table>
                     <thead>
                            <h3>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
                     </thead>
                     <tbody>
                            <tr>
                                   <td>Nhập dãy số: </td>
                                   <td><input type="text" name="input" value="<?php echo $a; ?>">(*)</td>
                            </tr>
                            <tr>
                                   <td colspan="2"><input type="submit" name="tong" value="Tổng dãy số" style="margin:
                                                 0 100px;"></td>
                            </tr>
                            <tr>
                                   <td>Tổng dãy số: </td>
                                   <td><input type="text" disabled value="<?php echo $tong; ?>"></td>
                            </tr>
                            <tr>
                                   <td colspan="2">(*) Các số được nhập cách nhau bằng dấu ","</td>
                            </tr>

                     </tbody>
              </table>
       </form>
</body>

</html>