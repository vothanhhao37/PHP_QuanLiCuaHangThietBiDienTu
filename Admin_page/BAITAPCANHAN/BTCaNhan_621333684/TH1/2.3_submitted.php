<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ các trường trong form
    $phepTinh = $_POST["phepTinh"];
    $soThuNhat = intval($_POST["soThuNhat"]);
    $soThuHai = intval($_POST["soThuHai"]);

    // Xử lý phép tính
    $ketQua = 0;
    switch ($phepTinh) {
        case "+":
            $ketQua = $soThuNhat + $soThuHai;
            $phepTinh="Cộng";
            break;
        case "-":
            $ketQua = $soThuNhat - $soThuHai;
            $phepTinh="Trừ";
            break;
        case "*":
            $ketQua = $soThuNhat * $soThuHai;
            $phepTinh="Nhân";
            break;
        case "/":
            if ($soThuHai != 0) {
              
                $ketQua = $soThuNhat / $soThuHai;
            } else {
            
                $ketQua = "Không thể chia cho 0";
            }
            $phepTinh="Chia";
            break;
        default:
            $ketQua = "Phép tính không hợp lệ";
            break;
    }

}
?>

<html>
<title>Phép tính trên 2 số</title>
<style>
        h1 {
            color: purple;
            text-align: center;
        }

        #container {

            background-color: yellow;
            display: inline-block;
            border: 5px solid #bf80ff;
           
        }

        table {
            background-color: orange;
            display: block;
            padding:5px;
        }
    </style>
<body>
    <div id="container">
        <h1>Phép tính trên 2 số</h1>
        <table>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                   <?php echo $phepTinh ?>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="number" name="soThuNhat" value="<?php echo isset($soThuNhat) ? $soThuNhat : "" ?>"></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type="number" name="soThuHai" value="<?php echo isset($soThuHai) ? $soThuHai : "" ?>"></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input disabled type="text" name="soThuHai" value="<?php echo isset($ketQua) ? $ketQua : "" ?>"></td>
            </tr>   
            <tr>
                <td></td>
                <td><input type="submit" value="Tính"></td>
            </tr>
        </table>
        <a href="2.3.php">Quay lại trang trước</a>
    </div>

</body>

</html>