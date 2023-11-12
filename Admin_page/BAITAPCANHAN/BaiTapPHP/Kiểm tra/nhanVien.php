<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    } else
        $id = "";
    if (isset($_POST['hoTen'])) {
        $hoTen = $_POST['hoTen'];
    } else
        $hoTen = "";

    if (isset($_POST['ngaySinh'])) {
        $ngaySinh = $_POST['ngaySinh'];
    } else
        $ngaySinh = "";

    if (isset($_POST['diaChi'])) {
        $diaChi = $_POST['diaChi'];
    } else
        $diaChi = "";

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else
        $email = "";
    if (isset($_POST['gt'])) {
        $gt = $_POST['gt'];
    }
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $ngaySinh)) {
        echo "Ngày sinh không hợp lệ. Vui lòng nhập ngày sinh theo định dạng yyyy-mm-dd.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email không hợp lệ, vui lòng nhập lại";
    }
    $ttNV = array();

    if (isset($_POST['them'])) {
        if (isset($_POST['gt']) == null || isset($_POST['id']) == null || isset($_POST['hoTen']) == null || isset($_POST['ngaySinh']) == null || isset($_POST['diaChi']) == null || isset($_POST['email']) == null) {
            echo "Không được để trống thông tin";
        } else
            echo "Thêm thông tin nhân viên thành công <br>";
        $nv = array($id, $hoTen, $ngaySinh, $diaChi, $email);
        array_push($ttNV, $nv);
    }
    if (isset($_POST['kq'])) {
        $nv = array($id, $hoTen, $ngaySinh, $diaChi, $email);
        array_push($ttNV, $nv);
        $kq = "Mã Nhân Viên: " . $id . "\n"
            . "Họ Tên Nhân Viên: " . $hoTen . "\n"
            . "Ngày Sinh: " . $ngaySinh . "\n"
            . "Địa Chỉ: " . $diaChi . "\n"

            . "Email: " . $email;

    }




    ?>
    <form action="" method="post">
        <table order="0" cellpadding="0">
            <th>
                <h2>Thông tin nhân viên</h2>
            </th>
            <tr>
                <td>Mã Nhân Viên</td>
                <td><input type="text" name="id" value="<?php echo $id ?>"></td>
            </tr>
            <tr>
                <td>Họ tên nhân viên</td>
                <td><input type="text" name="hoTen" value="<?php echo $hoTen ?>"></td>
            </tr>
            <tr>
                <td>Ngày Sinh</td>
                <td><input type="text" name="ngaySinh" value="<?php echo $ngaySinh ?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="diaChi" value="<?php echo $diaChi ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email ?>"></td>
            </tr>
            <tr>
                <td>Phòng Ban</td>
                <td><select id="PhongBan" name="PhongBan" required>
                        <option value="Hành chính">Hành chính</option>
                        <option value="Kế toán">Kế toán</option>
                        <option value="Nhân sự">Nhân sự</option>
                        <option value="Tiếp thị">Tiếp thị</option>
                    </select><br><br></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td><input type="radio" name="gt" value="Nam ">Nam</td>
                <td><input type="radio" name="gt" value="Nu">Nữ</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="them" value="Thêm Nhân Viên"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Lưu Nhân Viên"></td>
            </tr>
            <tr>
                <td></td>
                <td><textarea name="kq" cols="40" rows="10"><?php echo $kq; ?></textarea></td>
            </tr>
        </table>
    </form>
</body>

</html>