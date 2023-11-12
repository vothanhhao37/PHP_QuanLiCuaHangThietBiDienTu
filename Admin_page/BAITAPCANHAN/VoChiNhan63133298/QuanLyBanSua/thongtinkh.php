<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Thông tin khách hàng</title>

</head>

<body>
    <style>
        td
        {
            text-align : center;
        }
    </style>

<?php
  // Ket noi CSDL

//require("connect.php");

$conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 

		OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

$sql = 'select Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai from khach_hang';

$result = mysqli_query($conn, $sql);



echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";

 echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

 echo '<tr>

    <th width="50">Mã KH</th>

     <th width="200">Tên khách hàng</th>

    <th align="center" width="80">Giới tính</th>

    <th width="300">Địa chỉ</th>

    <th width="200">Số điện thoại</th>

    <th width="200" colspan=2>Thao tác</th>

</tr>';



 if(mysqli_num_rows($result)<>0)

 $color = 0;

	while($rows=mysqli_fetch_row($result))

	    {          
            if ($color)
            {
                echo "<tr>";
                echo "<form action='./xlkh.php' method='post'>";

		     echo "<td>$rows[0]</td>";

		     echo "<td>$rows[1]</td>";
            
             if (!$rows[2])
             {
                 echo '<td align="center"><img style="width: 100%" src="./img/pngtree-male-gender-profile-circle-user-png-image_5320450.png"></td>';

             }
             else 
             {
                echo '<td align="center"><img style="width: 100%" src="./img/download.png"></td>';
             }

		     echo "<td>$rows[3]</td>";
		     echo "<td>$rows[4]</td>";


		                  
             echo "<input style='display:none;'type='text' name='makh' value='$rows[0]'>";

		     echo "<td><input type='submit' value='Sửa' name='edit'/></td>";
		     echo "<td><input type='submit' value='Xóa' name='delete'/></td>";
		     echo "</tr>";
             echo "</form>";
             $color = 0;
            }
            else 
            {
                echo "<form action='./xlkh.php' method='post'>";
                echo '<tr style="background-color: red">';
                
                echo "<td>$rows[0]</td>";
                
		     echo "<td>$rows[1]</td>";

             if (!$rows[2])
             {
                 echo '<td align="center"><img style="width: 100%" src="./img/pngtree-male-gender-profile-circle-user-png-image_5320450.png"></td>';

             }
             else 
             {
                echo '<td align="center"><img style="width: 100%" src="./img/download.png"></td>';
             }

		     echo "<td>$rows[3]</td>";
		     echo "<td>$rows[4]</td>";
             
             echo "<input style='display:none;'type='text' name='makh' value='$rows[0]'>";

		     echo "<td><input type='submit' value='Sửa' name='edit'/></td>";
		     echo "<td><input type='submit' value='Xóa' name='delete'/></td>";
		     echo "</tr>";
             echo "</form>";
             $color = 1;
            }
        }    
        
        

        echo"</table>";
        
        mysqli_free_result($result);
        mysqli_close($conn);
?>
</body>
</html>
