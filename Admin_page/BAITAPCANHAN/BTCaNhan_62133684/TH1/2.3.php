<?php


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
        <form action="2.3_submitted.php" method="post">
        <table>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="phepTinh" value="+" checked> Cộng
                    <input type="radio" name="phepTinh" value="-"> Trừ
                    <input type="radio" name="phepTinh" value="*"> Nhân
                    <input type="radio" name="phepTinh" value="/"> Chia
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="number" name="soThuNhat"></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type="number" name="soThuHai"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tính"></td>
            </tr>
        </table>
        </form>
       
    </div>

</body>

</html>