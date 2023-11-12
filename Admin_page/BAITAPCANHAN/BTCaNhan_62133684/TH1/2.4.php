
<html>
<title>Nhập thông tin</title>
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
   
    <fieldset id="container">
        <legend>Enter your information</legend>
        <form action="2.4.XuLiThongTin.php" method="post">
        <table>
          
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="ten"></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="textr" name="dc"></td>
            </tr>
            <tr>
                <td>Số diện thoại:</td>
                <td><input type="text" name="sdt"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <input type="radio" name="gt" value="Nam" checked> Nam
                    <input type="radio" name="gt" value="Nữ"> Nữ
                  
                </td>
            </tr>
            <tr>
                <td>Quốc tịch</td>
               <td>
                <select name="quocTich" id="">
                    <option value="Việt Nam">Việt Nam</option>
                    <option value="Mỹ">Mỹ</option>
                </select>
               </td>
            </tr>
            <tr>
                <td>Các môn đã được học</td>
               <td>                      
                    <input type="checkbox" name="monHoc[]" value="PHP" > PHP
                    <input type="checkbox" name="monHoc[]" value="MYSQL"> MYSQL
                    <input type="checkbox" name="monHoc[]" value="C#"> C#
                    <input type="checkbox" name="monHoc[]" value="XML"> XML
                    <input type="checkbox" name="monHoc[]" value="Python"> Python
              
               </td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td>
                    <textarea name="ghiChu" id="" cols="30" rows="10"></textarea>
                </td>   
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="gui" value="Gửi">
                    <input type="submit"name="huy" value="Hủy">
                </td>
                 
            </tr>
        </table>
        </form>
       
    </fieldset>
  

</body>

</html>