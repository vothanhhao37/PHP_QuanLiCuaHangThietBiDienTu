<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

       <title>Thông tin khách hàng</title>

</head>

<body>

       <?php



       // Ket noi CSDL
       
       //require("connect.php");
       
       $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

              or die('Could not connect to MySQL: ' . mysqli_connect_error());

       $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi, Dien_thoai from khach_hang';

       $result = mysqli_query($conn, $sql);



       echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";

       echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

       echo '<tr>

    <th width="50">Mã khách hàng</th>

     <th width="50">Tên khách hàng</th>
     <th width="50">Giới tính</th>

    <th width="150">Địa chỉ</th>

    <th width="200">Số điện thoại</th>

</tr>';



       if (mysqli_num_rows($result) <> 0) {
              $tam = 2;
              while ($rows = mysqli_fetch_row($result)) {
                     
                     if($tam%2==0){
                            $mau = 'style="background-color: orange;"';
                     }
                     else $mau = "";
                     echo "<tr>";

                     echo "<td $mau>$rows[0]</td>";

                     echo "<td $mau>$rows[1]</td>";
                     if($rows[2]==1){
                            echo '<td><img src="./nu.png" alt=""></td>';
                     }
                     else{
                            echo '<td><img src="./nam.jpg" alt=""></td>';
                     }
                     

                     echo "<td $mau>$rows[3]</td>";
                     echo "<td $mau>$rows[4]</td>";

                     echo "</tr>";
                     $tam+=1;

              }

       }

       echo "</table>";

       ?>
       
</body>

</html>