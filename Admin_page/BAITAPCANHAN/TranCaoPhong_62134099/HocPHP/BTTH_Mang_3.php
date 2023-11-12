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
       if (isset($_POST['nam'])) {
              $nam = $_POST['nam'];
       } else
              $nam = "";
       $nam_al="";
       if (isset($_POST['submit'])) {
              $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
              $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
              $mang_hinh = array("Hoi.jpg", "Ty.jpg", "Suu.jpg", "Dan.jpg", "Mao.jpg", "Thin.jpg", "Ty.jpg", "Ngo.jpg", "Mui.jpg", "Than.jpg", "Dau.jpg", "Tuat.jpg");
              $nam = $nam-3;
              $can = $nam % 10;
              $chi = $nam % 12;
              $nam_al = $mang_can[$can];
              $nam_al = $nam_al . " " . $mang_chi[$chi];
              $hinh = $mang_hinh[$chi];
              $hinh_anh = "<img src='images/$hinh'>";
       }

       ?>
       <form action="" method="post">

              <table border="0" cellpadding="0">

                     <th colspan="3">
                            <h2>Tính năm âm lịch</h2>
                     </th>

                     <tr>

                            <td>Năm dương lịch:</td>
                            <td></td>
                            <td>Năm âm lịch:</td>
                     </tr>

                     <tr>

                            <td><input type="text" name="nam" size="30" value="<?php echo $nam; ?> " /></td>
                            <td><input type="submit" name="submit" size="30" value="=>" /></td>
                            <td><input disabled type="text" name="ketqua" size="30" value="<?php echo $nam_al; ?> " /></td>
                     </tr>
                     <tr>
                            <td colspan="3"><?php echo $hinh_anh; ?></td>
                     </tr>



              </table>

       </form>
</body>

</html>