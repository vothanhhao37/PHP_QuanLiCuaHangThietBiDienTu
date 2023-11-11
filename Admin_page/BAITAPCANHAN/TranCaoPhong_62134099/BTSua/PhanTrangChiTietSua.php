<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');
$rowsPerPage = 2; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page'])) {
       $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
$sql = "SELECT hinh, tp_dinh_duong, loi_ich, trong_luong, don_gia, ten_sua FROM sua LIMIT $offset , $rowsPerPage";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <style>
                     *{
                            padding: 0;
                            margin: 0;
                            box-sizing: border-box;
                     }
                     table {
                            width: 600px;
                            border: 1px solid black;
                            margin: 7px auto;
                     }
                     th {
                            background-color: #e3b562;
                            padding: 10px;
                     }
                     img {
                            /* border: 1px solid; */
                     }
                     #noidung {
                            border: 1px solid;
                            
                     }
              </style>
</head>

<body>
       <p align='center'>
              <font size='5' color='blue'> THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</font>
       </p>
       <?php
       if (mysqli_num_rows($result) > 0) {
              echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>

              <tr hidden>

                     <th width='100'></th>

                     <th width='100'></th>

              </tr>";
              while ($row = mysqli_fetch_row($result)) {
                     ?>
                     
                            <tr>
                                   <th colspan="2"><?php echo $row[5] ?></th>
                            </tr>
                            <tr>
                                   <td><img width="180px" src=<?php echo "./hinh_sua/" . $row[0] ?> alt=""><br>
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
                     
                     <?php
              }
              echo "</table>";
              $re = mysqli_query($conn, 'select * from sua');
              //tổng số mẩu tin cần hiển thị
              $numRows = mysqli_num_rows($re);
              //tổng số trang
              $maxPage = floor($numRows / $rowsPerPage) + 1;

              //tạo link tương ứng tới các trang
              echo '<p align= "center">';
              if ($_GET['page'] > 1) {
                     echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=1" . "><</a> ";
                     echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "><<</a> ";


              }


              for ($i = 1; $i <= $maxPage; $i++) {
                     if ($i == $_GET['page']) {
                            echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
                     } else
                            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
              }
              if ($_GET['page'] < $maxPage) {
                     echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">>></a>";
                     echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($maxPage) . ">></a>";
              }
              echo '</p>';
       }
       ?>




</body>

</html>