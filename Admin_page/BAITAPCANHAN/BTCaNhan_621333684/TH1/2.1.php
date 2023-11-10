<?php


if (isset($_POST["chieudai"])) {
    $chieudai = intval($_POST["chieudai"]);
} else
    $chieudai = 0;
if (isset($_POST["chieurong"])) {
    $chieurong = intval($_POST["chieurong"]);
} else {
    $chieurong = 0;
}
$dientich = $chieudai * $chieurong;
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
            <h1>Diện tích hình chữ nhật</h1>
            <table>
                <tr>
                    <td>Chiều dài</td>
                    <td><input type="text" name="chieudai" value="<?php echo isset($chieudai) ? $chieudai : "" ?>"></td>
                </tr>
                <tr>
                    <td>Chiều rộng</td>
                    <td><input type="text" name="chieurong" value="<?php echo isset($chieurong) ? $chieurong : "" ?>"></td>
                </tr>
                <tr>
                    <td>Diện tích</td>
                    <td><input disabled type="text" name="dientich" value="<?php echo isset($dientich) ? $dientich : "" ?>">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan=2> <input type="submit" value="Tính"></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>