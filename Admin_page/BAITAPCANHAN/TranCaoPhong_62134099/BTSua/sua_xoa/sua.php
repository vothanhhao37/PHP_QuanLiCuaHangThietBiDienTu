<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <style>
              table {
                     margin: auto;
                     border-collapse: collapse;
              }
              thead tr th {
                     padding: 5px;
                     background-color: orange;
              }
              tbody {
                     background-color: #f3dbaf;
              }
              td {
                     padding: 5px;
              }
       </style>
</head>

<body>
       <?php
       $conn = mysqli_connect("localhost", "root", "", "qlbansua")
       or die('Could not connect to MySQL: ' . mysqli_connect_error());
       $maKH = $_GET["maKH"];
       $sql = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '".$maKH."'";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_row($result);
       if(isset($_POST["capnhat"])){
              $sql = "UPDATE khach_hang SET Ten_khach_hang = '".$_POST['tenKH']."', Phai = '".$_POST['phai']."', 
              Dia_chi = '".$_POST['diachi']."', Dien_thoai = '".$_POST['dienthoai']."', email = '".$_POST['email']."'
              WHERE Ma_khach_hang = '".$maKH."'";
              mysqli_query($conn, $sql);
              header("location: ./index.php");
       }
       ?>
       <form action="" method="POST">
       <table>
              <thead>
                     <tr>
                            <th colspan="2">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</th>
                     </tr>
              </thead>
              <tbody>
                     <tr>
                            <td>Mã khách hàng:</td>
                            <td><input size="10" type="text" name="maKH" value="<?php echo $maKH ?>" disabled></td>
                     </tr>
                     <tr>
                            <td>Tên khách hàng:</td>
                            <td><input size="40" type="text" name="tenKH" value="<?php echo $row[1] ?>"></td>
                     </tr>
                     <tr>
                            <td>Phái:</td>
                            <td>
                                   <input type="radio" name="phai" value="0" <?php if($row[2] == "0") echo "checked"; ?>>Nam
                                   <input type="radio" name="phai" value="1" <?php if($row[2] == "1") echo "checked"; ?>>Nữ
                            </td>
                     </tr>
                     <tr> <td>Địa chỉ:</td>
                            <td><input size="40" type="text" name="diachi" value="<?php echo $row[3] ?>"></td>
                     </tr>
                     <tr>
                            <td>Điện thoại:</td>
                            <td><input type="text" name="dienthoai" value="<?php echo $row[4] ?>"></td>
                     </tr>
                     <tr>
                            <td>Email:</td>
                            <td><input size="40" type="text" name="email" value="<?php echo $row[5] ?>"></td>
                     </tr>
                     <tr>
                            <td style="background-color: #e1a73d;" colspan="2" align="center"><input type="submit" value="Cập nhật" name="capnhat"></td>
                     </tr>
              </tbody>
       </table>
       </form>
</body>

</html>