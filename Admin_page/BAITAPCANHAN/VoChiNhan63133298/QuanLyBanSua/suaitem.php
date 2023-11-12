<?php
    echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">

    <tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' .

    $row['Ten_sua'] . ' - ' . $row['Ten_hang_sua'] . '</h3></td></tr>';

    echo '<tr><td width="200" align="center"><img src="Hinh_sua/' . $row['Hinh'] . '"/></td>';

    echo '<td><i><b>Thành phần dinh dưỡng:</i></b><br />' . $row['TP_Dinh_Duong'] . '<br />';

    echo '<i><b>Lợi ích:</b></i>' . $row['Loi_ich'] . '<br />';

    echo '<i><b>Trọng lượng: </b></i>' . $row['Trong_luong'] . ' gr - <i><b>Đơn giá: </b></i>' .

        $row['Don_gia'] . ' VNĐ';

    echo '</td></tr></table>';
?>