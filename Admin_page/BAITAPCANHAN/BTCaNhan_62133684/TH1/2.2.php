<?php


if (isset($_POST["tenchuho"])) {
    $tenchuho = $_POST["tenchuho"];
} else
    $tenchuho = "";
if (isset($_POST["chisocu"])) {
    $chisocu = intval($_POST["chisocu"]);
} else {
    $chisocu = 0;
}
if (isset($_POST["chisomoi"])) {
    $chisomoi = intval($_POST["chisomoi"]);
} else {
    $chisomoi = 0;
}
if (isset($_POST["dongia"])) {
    $dongia = intval($_POST["dongia"]);
} else {
    $dongia = 0;
}
$tienthanhtoan = ($chisomoi - $chisocu)*$dongia;
?>
<html>

<body>
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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div id="container">
            <h1>Thanh toán tiền điện</h1>
            <table>
                <tr>
                    <td>Tên chủ hộ</td>
                    <td><input type="text" name="tenchuho" value="<?php echo isset($tenchuho) ? $tenchuho : "" ?>"></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ</td>
                    <td><input type="text" name="chisocu" value="<?php echo isset($chisocu) ? $chisocu : "" ?>"></td>
                </tr>
                <tr>
                    <td>Chỉ số mới</td>
                    <td><input  type="text" name="chisomoi" value="<?php echo isset($chisomoi) ? $chisomoi : "" ?>">
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td><input type="text" name="dongia" value=20000></td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán</td>
                    <td><input disabled type="text" name="tienthanhtoan" value="<?php echo isset($tienthanhtoan) ? $tienthanhtoan : "" ?>"></td>
                </tr>
                <tr align="center">
                    <td colspan=2> <input type="submit" value="Tính"></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>