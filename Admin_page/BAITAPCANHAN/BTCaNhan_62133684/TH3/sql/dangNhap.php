<!DOCTYPE html>
<html>
<head>
    <title>Form Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .container input[type="text"],
        .container input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        
        .container input[type="submit"] {
            width: 96%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            
        }
        
        .container input[type="submit"]:hover {
            background-color: #45a049;
           
        }
        
        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng Nhập</h2>
        <form method="POST" action="dangNhap.php">
            <input type="text" name="ten_dang_nhap" placeholder="Tên đăng nhập" required>
            <input type="password" name="mat_khau" placeholder="Mật khẩu" required>
            <input type="submit" value="Đăng Nhập">
        </form>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error-message">Tên đăng nhập hoặc mật khẩu không đúng.</p>';
        }
        ?>
    </div>
</body>
</html>
<?php
// Kết nối đến cơ sở dữ liệu MySQL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = $_POST['mat_khau'];

    $sql = "SELECT * FROM user WHERE ten_dang_nhap = '$ten_dang_nhap' AND mat_khau = '$mat_khau'";
    $result = mysqli_query($conn, '$sql');
   echo $result->num_rows;
    if ($result->num_rows == 1) {
        // Đăng nhập thành công, chuyển hướng đến trang "sql5.php"
        header("Location: sql5.php");
        exit();
    } else {
        // Đăng nhập không thành công, chuyển hướng trở lại trang đăng nhập với thông báo lỗi
        // header("Location: html_error.php");
        // exit();
    }
}

$conn->close();
?>