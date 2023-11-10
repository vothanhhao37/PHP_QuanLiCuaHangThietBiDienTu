<table>
    <tr>
        <td>Họ và tên: </td>
        <td><input type="text" name="name" value="<?php echo $name ?>"></td>
        <td>Số con: </td>
        <td><input type="text" name="name" value="<?php echo $name ?>"></td>
    </tr>
    <tr>
        <td>Ngày sinh: </td>
        <td><input type="text" name="bDay" value="<?php echo $bDay ?>"></td>
        <td>Ngày vào làm: </td>
        <td><input type="text" name="startDate" value="<?php echo $startDate ?>"></td>
    </tr>
    <tr>
        <td>Giới tính: </td>
        <td>
            <input type="radio" name="gender" value="male" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "male")
                echo "checked" ?>>Nam
                <input type="radio" name="gender" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "female")
                echo "checked" ?>>Nữ
            </td>
            <td>Hệ số lương: </td>
            <td><input type="text" name="coefficient" value="<?php echo $coefficient ?>"></td>
    </tr>
    <tr>
        <td>Loại nhân viên: </td>
        <td><input type="radio" name="empType" value="office" <?php if (isset($_POST["emType"]) && $_POST["emType"] == "office")
            echo "checked"; ?>> Văn phòng</td>
        <td colspan="2"><input type="radio" name="empType" value="production" <?php if (isset($_POST["emType"]) && $_POST["emType"] == "production")
            echo "checked"; ?>> Sản xuất
        </td>
    </tr>
    <tr>
        <td></td>
        <td>Số ngày vắng:<input type="text" name="dayoff" value="<?php echo $dayoff ?>"></td>
        <td>Số sản phẩm: </td>
        <td><input type="text" name="productCount" value="<?php echo $productCount ?>"></td>
    </tr>
    <tr>
        <td colspan="4"><input type="submit" value="Tính lương" name="submit"></td>
    </tr>
    <tr>
        <td>Tiền lương: </td>
        <td><input type="text" name="salary" value="<?php echo $salary ?>"></td>
        <td>Trợ cấp: </td>
        <td><input type="text" name="allowance" value="<?php echo $allowance ?>"></td>
    </tr>
    <tr>
        <td>Tiền thưởng: </td>
        <td><input type="text" name="bonus" value="<?php echo $bonus ?>"></td>
        <td>Tiền phạt: </td>
        <td><input type="text" name="fine" value="<?php echo $fine ?>"></td>
    </tr>
    <tr><td align="center" colspan="4">Thực lĩnh: <input type="text" value="<?php echo $total; ?>"></td></tr>
</table>