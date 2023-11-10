<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="ketquapheptinh.php" method="post">
        <table>
            <thead>Phép tính trên 2 số</thead>
            <tbody>
                <tr>
                    <td>Chọn phép tính: </td>
                    <td><input type="radio" name="op" value="Plus"  checked> Cộng
                            <input type="radio" name="op" value="Diff" > Trừ 

                            <input type="radio" name="op" value="Mul"> Nhân
                            <input type="radio" name="op" value="Div" > Chia </td>
                    </tr>
                    <tr>
                        <td>Số thứ nhất: </td>
                        <td>
                            <input type="text" name="num1" value="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Số thứ hai: </td>

                        <td><input type="text" name="num2" value="0"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Tính"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>

    </html>