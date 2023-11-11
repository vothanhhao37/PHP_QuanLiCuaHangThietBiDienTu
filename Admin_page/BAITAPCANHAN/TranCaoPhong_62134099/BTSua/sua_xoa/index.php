<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <style>
              table {
                     border: 1px solid black;
                     margin: auto;
              }
              td {
                     border: 1px solid black;
              }

              h2 {
                     text-align: center;
              }
       </style>
</head>

<body>
       <?php
       $conn = mysqli_connect("localhost", "root", "", "qlbansua")
              or die('Could not connect to MySQL: ' . mysqli_connect_error());
       $sql = 'SELECT * FROM khach_hang';
       $result = mysqli_query($conn, $sql);
       ?>
       <h2>THÔNG TIN KHÁCH HÀNG</h2>
       <table>
              <thead>
                     <tr align="center">
                            <td>Mã KH</td>
                            <td>Tên khách hàng</td>
                            <td>Giới tính</td>
                            <td>Địa chỉ</td>
                            <td>Số điện thoại</td>
                            <td>Email</td>
                            <td><img src="./icon/sua.png" alt="" width="20px"></td>
                            <td><img src="./icon/xoa.png" alt="" width="20px"></td>
                     </tr>
              </thead>
              <tbody>

                     <?php
                     if (mysqli_num_rows($result) > 0) {
                            $stt = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                   if($row[2]==1) $phai = 'Nữ';
                                   else $phai = 'Nam';
                                   if ($stt % 2 == 0)
                                          echo "<tr style='background-color: pink;'>";
                                   else
                                          echo "<tr>";
                                   echo "
                                   <td>$row[0]</td>
                                   <td>$row[1]</td>
                                   <td>$phai</td>
                                   <td>$row[3]</td>
                                   <td>$row[4]</td>
                                   <td>$row[5]</td>
                                   <td><a href='sua.php?maKH=$row[0]'>Sửa</a></td>
                                   <td><a href='xoa.php?maKH=$row[0]'>Xóa</a></td>
                            </tr>";
                                   $stt++;
                            }
                     }
                     ?>
              </tbody>
       </table>
</body>

</html>