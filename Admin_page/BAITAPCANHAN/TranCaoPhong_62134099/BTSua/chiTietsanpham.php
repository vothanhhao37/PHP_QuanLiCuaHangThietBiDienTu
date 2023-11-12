<html>
       <head>
              <style>
                     *{
                            padding: 0;
                            margin: 0;
                            box-sizing: border-box;
                     }
                     table {
                            width: 600px;
                            border: 1px solid black;
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
              <?php
              $conn = mysqli_connect("localhost","root","","qlbansua");
              $tensp = $_GET['ten_sua'];
              $sql = "SELECT hinh, tp_dinh_duong, loi_ich, trong_luong, don_gia FROM sua WHERE ten_sua = '".$tensp."'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_row($result);

              ?>
              <table>
                     <thead>
                            <tr>
                                   <th colspan="2"><?php echo $tensp ?></th>
                            </tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td><img width="180px" src=<?php echo "./hinh_sua/".$row[0]?> alt=""><br>
                                   <a href="javascript:window.history.back(-1);">Quay về</a>
                            </td>
                                   <td id="noidung">
                                          <div style="margin: 5px 5px;">Thành phần dinh dưỡng<br><?php echo $row[1]?></div>
                                          <div style="margin: 5px 5px;">Lợi ích: <br><?php echo $row[2]?></div>
                                          <div style="float: right;margin: 5px 5px;">Trọng lượng:<?php echo $row[3]?>gr - Đơn giá: <?php echo $row[4]?></div>
                                   </td>
                            </tr>
                     </tbody>
              </table>
       </body>
</html>