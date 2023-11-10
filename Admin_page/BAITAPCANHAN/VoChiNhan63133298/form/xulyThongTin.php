<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST['btn_send']))
        {
            $name = $address = $pnumber = $sex = $region = $note = "";
        $subject = array();
        
        if (isset($_POST['subject_php']))
        {
            $subject[] = $_POST['subject_php'];
        }

        if (isset($_POST['subject_csharp']))
        {
            $subject[] = $_POST['subject_csharp'];
        }
        if (isset($_POST['subject_xml']))
        {
            $subject[] = $_POST['subject_xml'];
        }
        if (isset($_POST['subject_python']))
        {
            $subject[] = $_POST['subject_python'];
        }
        $subject_str =  implode(", ", $subject);

        if (isset($_POST['name']))
        {
            $name = trim($_POST['name']);
        }
        if (isset($_POST['address']))
        {
            $address = trim($_POST['address']);
        }
        if (isset($_POST['pnumber']))
        {
            $pnumber = trim($_POST['pnumber']);
        }
        if (isset($_POST['sex']))
        {
            $sex = $_POST['sex'] == "male" ? "Nam" : "Nữ";
        }
        if (isset($_POST['region']))
        {
            switch($_POST['region'])
            {
                case "region_vn" : $region = "Việt Nam"; break;
                case "region_usa" : $region = "Mỹ"; break;
                case "region_cn" : $region = "Trung Quốc"; break;
                case "region_kr" : $region = "Hàn Quốc"; break;
            }
        }
        if (isset($_POST['note']))
        {
            $note = $_POST['note'];
        }
        }
    ?>
<h2>Thông tin bạn vừa nhập: </h2>
<table>
            <tr>
                <td>Họ tên: </td>
                <td>
                    <?php echo $name; ?>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td>
                    <?php echo $address; ?>
                </td>
            </tr>
            <tr>
                <td>Số điện thoại:  </td>
                <td>
                    <?php echo $pnumber ?>
                </td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <?php echo $sex ?>
                </td>
            </tr>
            <tr>
                <td>Quốc tịch: </td>
                <td>
                    <?php echo $region ?>
                </td>
            </tr>
            <tr>
                <td>Các môn đã học:</td>
                <td>
                    <?php echo $subject_str ?>
                </td>
            </tr>
            <tr>
                <td>Ghi chú: </td>
                <td>
                    <?php echo $note ?>
                </td>
            </tr>
        </table>
        <a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
</body>
</html>