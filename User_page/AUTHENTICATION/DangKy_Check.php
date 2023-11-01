<?php
include ("../../db_connect.php");
if (
    isset($_POST['TENKH']) && isset($_POST['MATKHAU'])
    && isset($_POST['EMAIL']) && isset($_POST['CONFIRM-MATKHAU'])
    && isset($_POST['DIACHI']) && isset($_POST['SDT']) 
    
) {
    function LayMaKH($db) {
        // Lấy danh sách các MAKH từ bảng KHACHHANG
        $query = "SELECT MAKH FROM KHACHHANG";
        $result = mysqli_query($db, $query);
    
        // Lấy MAKH lớn nhất
        $maMax = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $maKH = $row['MAKH'];
            if ($maKH > $maMax) {
                $maMax = $maKH;
            }
        }
    
        // Tạo mã KH mới
        $maKH = intval(substr($maMax, 2)) + 1;
        $SP = str_pad($maKH, 3, '0', STR_PAD_LEFT);
        return 'KH' . $SP;
    }
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $makh = LayMaKH($conn);
    $tenkh = validate($_POST['TENKH']);
    $taikhoan = validate($_POST['TAIKHOAN']);
    $matkhau = validate($_POST['MATKHAU']);
    $confirm_password = validate($_POST['CONFIRM-MATKHAU']);
    $sdt = validate($_POST['SDT']);
    $diachi = validate($_POST['DIACHI']);
    $email = validate($_POST['EMAIL']);
    $cmnd = validate($_POST['CMND']);
    $user_data = 'TENKH=' . $tenkh . '&TAIKHOAN=' . $taikhoan . '&MATKHAU=' . $matkhau . '&CONFIRM-MATKHAU=' . 
    $confirm_password . '&SDT=' . $sdt . '&DIACHI=' . $diachi . '&EMAIL=' . $email . '&CMND=' . $cmnd;
    if (empty($tenkh)) {
       
        header("Location: DangKy.php?error=Họ và tên là bắt buộc&$user_data");
        exit();
    } else if (empty($taikhoan)) {
        header("Location: DangKy.php?error=Tên tài khoản là bắt buộc&$user_data");
        exit();
    } else if (empty($matkhau)) {
        header("Location: DangKy.php?error=Mật khẩu là bắt buộc&user_data");
        exit();
    } else if ($confirm_password != $matkhau) {
        header("Location: DangKy.php?error=Mật khẩu không khớp&$user_data");
        exit();
    } else if (empty($diachi)) {
        header("Location: DangKy.php?error=Địa chỉ là bắt buộc&$user_data");
        exit();
    } else if (empty($sdt)) {
		header("Location: DangKy.php?error=Số điện thoại là bắt buộc&$user_data");
		exit();
	}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: DangKy.php?error=Địa chỉ email không hợp lệ&$user_data");
		exit();
	}  else {

       
        $sql = "SELECT * FROM khachhang WHERE TAIKHOAN='$taikhoan' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: DangKy.php?error=Tên đăng nhập đã được sử dụng bởi người khác$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO khachhang(MAKH,TENKH,TAIKHOAN,MATKHAU,DIACHI,EMAIL,SDT,CMND)
             VALUES('$makh','$tenkh', '$taikhoan', '$matkhau','$diachi','$email','$sdt','$cmnd')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: DangKy.php?success=Tạo tài khoản thành công");
                exit();
            } else {
                header("Location: DangKy.php?error=Lỗi không xác định");
                exit();
            }
        }
    }

} 
else {
	header("Location: DangKy.php");
	exit();
}