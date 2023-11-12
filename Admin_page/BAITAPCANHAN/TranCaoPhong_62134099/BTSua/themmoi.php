<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <style>
              * {
                     padding: 0;
                     margin: 0;
                     box-sizing: border-box;
              }

              .a {
                     margin: 5px auto;
                     border-collapse: collapse;
                     width: 600px;
              }

              .a thead td {
                     background-color: palevioletred;
                     text-align: center;
              }

              .a tbody {
                     background-color: pink;
              }

              .a td {
                     padding: 5px;
              }

              .b {
                     margin: 0 auto;
                     width: 600px;
                     border: 1px solid black;
              }

              .b thead th {
                     background-color: #e3b562;
                     padding: 10px;
              }

              .b img {
                     border: 1px solid;
              }

              .b #noidung {
                     border: 1px solid;

              }
       </style>
</head>

<body>

       <?php
       $conn = mysqli_connect("localhost", "root", "", "qlbansua")
              or die('Could not connect to MySQL: ' . mysqli_connect_error());
       if (!empty($_POST['masua'])) {
              $maSua = $_POST['masua'];
       } else
              $maSua = "";
       if (!empty($_POST['tensua'])) {
              $tenSua = $_POST['tensua'];
       } else
              $tenSua = "";
       if (!empty($_POST['hangsua'])) {
              $hangSua = $_POST['hangsua'];
       } else
              $hangSua = "";
       if (!empty($_POST['loaisua'])) {
              $loaiSua = $_POST['loaisua'];
       } else
              $loaiSua = "";
       if (!empty($_POST['trongluong'])) {
              $trongLuong = $_POST['trongluong'];
       } else
              $trongLuong = "";
       if (!empty($_POST['dongia'])) {
              $donGia = $_POST['dongia'];
       } else
              $donGia = "";
       if (!empty($_POST['tpdd'])) {
              $tpdd = $_POST['tpdd'];
       } else
              $tpdd = "";
       if (!empty($_POST['loiich'])) {
              $loiIch = $_POST['loiich'];
       } else
              $loiIch = '';
       if (!empty($_FILES['hinh']['name'])) {
              $hinh = basename($_FILES['hinh']['name']);
       } else
              $hinh = "";

       $sql_hangsua = "SELECT ma_hang_sua, ten_hang_sua from hang_sua";
       $sql_loaisua = "SELECT ma_loai_sua, ten_loai from loai_sua";
       $result_hangsua = mysqli_query($conn, $sql_hangsua);
       $result_loaisua = mysqli_query($conn, $sql_loaisua);
       ?>

       <form action="" method="post" enctype="multipart/form-data">
              <table class="a">
                     <thead>
                            <tr>
                                   <td colspan="2">THÊM SỮA MỚI</td>
                            </tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td>Mã sữa</td>
                                   <td><input type="text" name="masua" value="<?php echo $maSua ?>"></td>
                            </tr>
                            <tr>
                                   <td>Tên sữa</td>
                                   <td><input type="text" name="tensua" value="<?php echo $tenSua ?>"></td>
                            </tr>
                            <tr>
                                   <td>Hãng sữa: </td>
                                   <td>
                                          <select name="hangsua" id="">
                                                 <?php while ($rows = mysqli_fetch_row($result_hangsua)) {
                                                        if ($hangSua == $rows[0])
                                                               echo "<option selected value='$rows[0]'>$rows[1]</option>";
                                                        else
                                                               echo "<option value='$rows[0]'>$rows[1]</option>";
                                                 } ?>

                                          </select>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Loại sữa: </td>
                                   <td>
                                          <select name="loaisua" id="">
                                                 <?php while ($row = mysqli_fetch_row($result_loaisua)) {
                                                        if ($loaiSua == $rows[0])
                                                               echo "<option selected value='$row[0]'>$row[1]</option>";
                                                        else
                                                               echo "<option value='$row[0]'>$row[1]</option>";
                                                 } ?>
                                          </select>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Trọng lượng: </td>
                                   <td><input type="text" name="trongluong" value="<?php echo $trongLuong ?>"></td>
                            </tr>
                            <tr>
                                   <td>Đơn giá: </td>
                                   <td><input type="text" name="dongia" value="<?php echo $donGia ?>"></td>
                            </tr>
                            <tr>
                                   <td>Thành phần dinh dưỡng: </td>
                                   <td><textarea name="tpdd" id="" cols="30" rows="3"><?php echo $tpdd ?></textarea>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Lợi ích: </td>
                                   <td><textarea name="loiich" id="" cols="30" rows="3"><?php echo $loiIch ?></textarea>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Hình ảnh</td>
                                   <td><input type="file" name="hinh"></td>
                            </tr>
                            <tr>
                                   <td align="center" colspan="2"><input type="submit" value="Thêm mới" name="themmoi">
                                   </td>
                            </tr>
                     </tbody>
              </table>
       </form>
       <?php

       if (isset($_POST['themmoi'])) {
              $sql = 'INSERT INTO SUA VALUE ("'.$maSua.'","' . $tenSua . '","' . $hangSua . '","' . $loaiSua . '","' . $trongLuong . '","' . $donGia . '",
       "' . $tpdd . '","' . $loiIch . '","' . $hinh . '")';
              mysqli_query($conn, $sql);
              $target_dir = "Hinh_sua/";
              $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
              move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
              echo "<p align='center'>KẾT QUẢ SAU KHI THÊM MỚI THÀNH CÔNG</p>";
              echo "<p align='center'>Thêm sữa thành công</p>";
              ?>
              <table class="b">
                     <thead>
                            <tr>
                                   <th colspan="2">
                                          <?php echo $tenSua ?>
                                   </th>
                            </tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td><img width="180px" src=<?php echo "./hinh_sua/" . $hinh ?> alt=""><br>

                                   </td>
                                   <td id="noidung">
                                          <div style="margin: 5px 5px;">Thành phần dinh dưỡng<br>
                                                 <?php echo $tpdd ?>
                                          </div>
                                          <div style="margin: 5px 5px;">Lợi ích: <br>
                                                 <?php echo $loiIch ?>
                                          </div>
                                          <div style="float: right;margin: 5px 5px;">Trọng lượng:
                                                 <?php echo $trongLuong ?>gr - Đơn giá:
                                                 <?php echo $donGia ?>
                                          </div>
                                   </td>
                            </tr>
                     </tbody>
              </table>
              <?php
       }

       ?>

</body>


</html>