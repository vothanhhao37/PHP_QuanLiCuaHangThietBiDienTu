<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('xlquanliNhanVien.php');
    ?>

    <form action="" method="post">
        <fieldset>
            <legend>QUẢN LÝ NHÂN VIÊN</legend>
            <table border='1'>
                <tr>
                    <td>Họ và tên: </td>
                    <td><input type="text" name="hoten" size="50" value="<?php echo $hoten; ?> " /></td>
                    <td>Số con: </td>
                    <td><input type="text" name="socon" size="50" value="<?php echo $socon; ?> " /></td>
                </tr>
                <tr>
                    <td>Ngày sinh: </td>
                    <td><input type="text" name="ngaysinh" size="50" value="<?php echo $ngaysinh; ?> " /></td>
                    <td>Ngày vào làm: </td>
                    <td><input type="text" name="ngayvaolam" size="50" value="<?php echo $ngayvaolam; ?> " /></td>
                </tr>
                <tr>
                    <td>Giới tính: </td>
                    <td>
                        <input type="radio" name="gt" value="nam" checked="true" <?php if (isset($_POST['gt']) && ($_POST['gt']) == "nam")
                            echo 'checked="checked"' ?> />Nam
                            <input type="radio" name="gt" value="nu" <?php if (isset($_POST['gt']) && ($_POST['gt']) == "nu")
                            echo 'checked="checked"' ?> />Nữ
                        </td>
                        <td>Hệ số lương: </td>
                        <td><input type="text" name="hesoluong" size="50" value="<?php echo $hesoluong; ?> " /></td>
                </tr>
                <tr>
                    <td>Loại nhân viên: </td>
                    <td>
                        <input type="radio" name="loainv" value="vp" checked="true" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "vp")
                            echo 'checked="checked"' ?> />Văn phòng
                        </td>
                        <td colspan="2">
                            <input type="radio" name="loainv" value="sx" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "sx")
                            echo 'checked="checked"' ?> />Sản xuất
                        </td>
                    </tr>
                    <tr>
                        <td>Số ngày vắng: </td>
                        <td><input type="text" name="songayvang" size="50" value="<?php echo $songayvang; ?> " /></td>
                    <td>Số sản phẩm: </td>
                    <td><input type="text" name="sosanpham" size="50" value="<?php echo $sosanpham; ?> " /></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><input type="submit" name="nut" size="10" value="   Tính lương   " />
                    </td>
                </tr>
                <tr>
                    <td>Tiền lương: </td>
                    <td><input type="text" name="tienluong" disabled="disable" size="50"
                            value="<?php echo $tienluong; ?> " /></td>
                    <td>Trợ cấp: </td>
                    <td><input type="text" name="trocap" disabled="disable" size="50" value="<?php echo $trocap; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>Tiền thưởng: </td>
                    <td><input type="text" name="tienthuong" disabled="disable" size="50"
                            value="<?php echo $tienthuong; ?> " /></td>
                    <td>Tiền phạt: </td>
                    <td><input type="text" name="tienphat" disabled="disable" size="50"
                            value="<?php echo $tienphat; ?> " /></td>
                </tr>
                <tr>
                    <td colspan="4" align="center">
                        Thực lĩnh:
                        <input type="text" name="thuclinh" disabled="disable" size="50"
                            value="<?php echo $thuclinh; ?> " />
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>