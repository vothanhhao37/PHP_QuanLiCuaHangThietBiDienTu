<html>

<head>
       <style>
              * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-align: justify;

}
              form {
                     
                     width: 600px;
                     text-align: center;
                     border: 1px solid black
              }

              h3 {
                     background-color: #b31db3;
                     color: white;
                     padding: 10px 0;
                     text-align: center;
                     box-sizing: border-box-box;
              }
              .head {
                     
                     background-color: #e7a6c5;
              }
              table{
                     width: 100%;
                     
              }
              input[type="text"] {
                     width: 300px;
              }
       </style>
</head>

<body>
       <?php
       function timKiem($arr, $so){
              foreach($arr as $key =>$name){
                     if($name==$so)
                            return $key;
              }
              return -1;
       }
       
       $chuoi = "";
       $so = '';
       if (isset($_POST['chuoi'])) {
              $chuoi = $_POST['chuoi'];
       }
       if (isset($_POST['so'])) {
              $so = $_POST['so'];
       }
       if (isset($_POST['xuly']) && $chuoi!='') {
              $arr =array();
              $arr= explode(",",$chuoi);
              $kq='';
              if($so!=''){
                     
                     $vitri=timKiem($arr, $so);
                     $kq=$vitri!=-1?"Tìm thấy $so tại vị trí thứ $vitri của mảng":"Không tìm thấy $so trong mảng";
              }
       }

       

       ?>
       <form action="" method="POST">
              <table>
                     <tr>
                            <h3>TÌM KIẾM</h3>
                     </tr>
                     <tbody>
                            <tr class="head">
                                   <td>Nhập mảng: </td>
                                   <td><input type="text" name="chuoi"  value="<?php echo $chuoi; ?>"></td>
                            </tr>
                            <tr class="head">
                                   <td>Nhập số cần tìm</td>
                                   <td><input type="text" name="so" value="<?php echo $so ?>"></td>
                            </tr>
                            <tr>
                                   <td></td>
                                   <td><input type="submit" name="xuly" value="Tìm kiếm"></td>
                            </tr>
                            
                            <tr>
                                   <td>Mảng: </td>
                                   <td><input type="text" disabled value="<?php echo $chuoi; ?>"></td>
                            </tr>
                            <tr>
                                   <td>Kết quả tìm kiếm: </td>
                                   <td><input type="text" disabled value="<?php echo $kq; ?>"></td>
                            </tr>
                            <tr>
                                   <td colspan="2" style="text-align: center; background-color: violet" >(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
                            </tr>

                     </tbody>
              </table>
       </form>
</body>

</html>