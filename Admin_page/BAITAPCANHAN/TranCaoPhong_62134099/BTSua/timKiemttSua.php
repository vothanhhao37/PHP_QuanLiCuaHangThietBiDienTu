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

              table {
                     width: 600px;
                     border: 1px solid black;
                     margin: auto;
              }

              thead th {
                     background-color: #e3b562;
                     padding: 10px;
              }

              img {
                     border: 1px solid;
              }

              #noidung {
                     border: 1px solid;

              }
       </style>
</head>

<body>
       <p align='center'>
              <font size='5' color='blue'> TÌM KIẾM THÔNG TIN SỮA</font>
       </p>
       <form action="" method="post">
              <div align='center'>
                     Tên sữa: <input type="text" name="ten" value="<?php echo (isset($_POST['ten']))? $_POST['ten']:""; ?>"> <input type="submit" value="Tìm kiếm" name="timkiem">
                     
              </div>
       </form>
       <?php
       $conn = mysqli_connect("localhost", "root", "", "qlbansua");
       if (isset($_POST["timkiem"])) {
              $tenSua = $_POST['ten'];
              $sql = "SELECT hinh, tp_dinh_duong, loi_ich, trong_luong, don_gia, ten_sua FROM sua WHERE ten_sua LIKE '%$tenSua%'";
              $result = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($result);
              echo "<p align ='center'>Có $count sản phẩm được tìm thấy</p><br>";
              while($row = mysqli_fetch_row($result) ) {
              ?>
              <table>
                     <thead>
                            <tr>
                                   <th colspan="2">
                                          <?php echo $row[5] ?>
                                   </th>
                            </tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td><img width="180px" src=<?php echo "./hinh_sua/" . $row[0] ?> alt="">
                                   </td>
                                   <td id="noidung">
                                          <div style="margin: 5px 5px;">Thành phần dinh dưỡng<br>
                                                 <?php echo $row[1] ?>
                                          </div>
                                          <div style="margin: 5px 5px;">Lợi ích: <br>
                                                 <?php echo $row[2] ?>
                                          </div>
                                          <div style="float: right;margin: 5px 5px;">Trọng lượng:
                                                 <?php echo $row[3] ?>gr - Đơn giá:
                                                 <?php echo $row[4] ?>
                                          </div>
                                   </td>
                            </tr>
                     </tbody>
              </table>
              <?php
              }
       }
       ?>

</body>

</html>