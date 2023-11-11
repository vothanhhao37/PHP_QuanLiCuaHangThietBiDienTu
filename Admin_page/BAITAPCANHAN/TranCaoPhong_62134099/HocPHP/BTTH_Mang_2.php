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
       function namNhuan($year)
       {
              if ($year % 400 == 0)
                     return true;
              if ($year % 4 == 0 && $year % 100 != 0)
                     return true;
              return false;
       }
       if (isset($_POST['m']))
              $m = $_POST['m'];
       else
              $m = 0;
       if (isset($_POST['n']))
              $n = $_POST['n'];
       else
              $n = 0;
       $tren = "";
       $duoi = "";
       if (isset($_POST['tren']) || isset($_POST['duoi'])) {
              if ($m > 2000) {
                     $tren .= "Không hợp lệ";
              } else
                     for ($i = $m; $i < 2000; $i++) {
                            if (namNhuan($i) == true)
                                   $tren .= "$i   ";
                     }
              if ($n < 2000) {
                     $duoi .= "Không hợp lệ";
              } else
                     for ($i = 2000; $i < $n; $i++) {
                            if (namNhuan($i) == true)
                                   $duoi .= "$i   ";
                     }
       }

       ?>
       <form action="" method="post">

              <table border="0" cellpadding="0">
                     </th>
                     <th colspan="2">
                            <h3>Năm nhập vào nhỏ hơn năm 2000</h3>
                            <h2>TÌM NĂM NHUẬN</h2>
                     </th>

                     <tr>

                            <td>Năm:</td>
                            <td><input type="text" name="m" size="30" value="<?php echo $m; ?> " /></td>
                     </tr>

                     <tr>

                            <td colspan="2" style="text-align: center;"><input type="submit" name="tren" size="20"
                                          value="   Tìm năm nhuận  " /></td>
                     </tr>
                     <tr>
                            <td colspan="2"><textarea name="ketquatren" id="" cols="70"
                                          rows="1"><?php echo $tren; ?></textarea></td>
                     </tr>

              </table>
              <table border="0" cellpadding="0">
                     </th>
                     <th colspan="2">
                            <h3>Năm nhập vào lớn hơn năm 2000</h3>
                            <h2>TÌM NĂM NHUẬN</h2>
                     </th>

                     <tr>

                            <td>Năm:</td>
                            <td><input type="text" name="n" size="30" value="<?php echo $n; ?> " /></td>
                     </tr>

                     <tr>

                            <td colspan="2" style="text-align: center;"><input type="submit" name="duoi" size="20"
                                          value="   Tìm năm nhuận  " /></td>
                     </tr>
                     <tr>
                            <td colspan="2"><textarea name="ketquaduoi" id="" cols="70"
                                          rows="1"><?php echo $duoi; ?></textarea></td>
                     </tr>

              </table>

       </form>
</body>

</html>