<?php
require("../shared/header.php");
require("../../db_connect.php")
  ?>
<!-- Start body -->
<?php
  if (isset($_POST["product_ID"])) $productID = $_POST["product_ID"]; 
  else $productID = "";
  if (isset($_POST["product_Name"])) $productName = $_POST["product_Name"]; 
  else $productName = "";
  if (isset($_POST["product_Quantity"])) $productQuantity = $_POST["product_Quantity"]; 
  else $productQuantity = "";
  if (isset($_POST["product_Price"])) $productPrice = $_POST["product_Price"]; 
  else $productPrice = "";
  if (isset($_POST["product_Description"])) $productDesc = $_POST["product_Description"]; 
  else $productDesc = "";

  if (isset($_FILES['product_Img']['tmp_name'])) {
    $file = $_FILES['product_Img'];
    $productImg = $file['name'];
    $fileTmpPath = $file['tmp_name'];
    $ProductImgError = $file['error'];
    $targetDir = '../../Images/';
    $targetPath = $targetDir . $hinhanh;
    move_uploaded_file($fileTmpPath, $targetPath);
  } else
      $productImg = "";

  if (isset($_POST["product_Brand"])) $productBrand = $_POST["product_Brand"]; else $productBrand = "";
  if (isset($_POST["product_Type"])) $productType = $_POST["product_Type"]; else $productType = "";
  if (isset($_POST["product_Stats"])) $productStats = $_POST["product_Stats"]; else $productStats = "";
?>
<h1 class="heading"></h1>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="product_ID">Mã sản phẩm</label>
    <input type="text" class="form-control" name="product_ID" id="product_ID" placeholder="Enter product ID" value="<?php echo $productID ?>">
  </div>
  <div class="form-group">
    <label for="product_Name">Tên sản phẩm</label>
    <input type="text" class="form-control" name="product_Name" id="product_Name" placeholder="Enter product name" value="<?php echo $productName ?>">
  </div>
  <div class="form-group">
    <label for="product_Price">Đơn giá</label>
    <input type="text" class="form-control" name="product_Price" id="productPrice" placeholder="Enter price" value="<?php echo $productPrice ?>">
  </div>
  <div class="form-group">
    <label for="product_Quantity">Số lượng</label>
    <input type="text" class="form-control" name="product_Quantity" id="product_Quantity" placeholder="Enter product quantity" value="<?php echo $productQuantity ?>">
  </div>
  <div class="form-group">
    <label for="product_Description">Mô tả</label>
    <textarea type="text" class="form-control" row="5" name="product_Description" id="product_Description" placeholder="Enter product description"><?php echo $productDesc ?></textarea>
  </div>
  <div class="form-group">
    <label for="product_Img">Ảnh</label>
    <input type="file" class="form-control" name="product_Img">
  </div>
  <div class="form-group">
    <label for="product_Type">Loại sản phẩm</label>
    <select class="form-control" id="product_Type" name="product_Type">
    <?php

    $getProductType_sql = "SELECT * FROM loaisanpham";
    // Array of options
    $productTypeList = mysqli_query($conn, $getProductType_sql);

    while ($row = mysqli_fetch_array($productTypeList)) {
      $selected = (isset($_POST["product_Type"]) && $_POST["product_Type"] == $row[0]) ? "selected" : "";
      echo "<option value='" . $row[0] . "'" . $selected . ">" . $row[1] . "</option>";
    }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="product_Stats">Thông số kỹ thuật</label>
    <select class="form-control" id="product_Stats" name="product_Stats">
    <?php

    $getProductStats_sql = "SELECT * FROM thongsokythuat";
    // Array of options
    $productStatsList = mysqli_query($conn, $getProductStats_sql);

    while ($row = mysqli_fetch_array($productStatsList)) {
      $selected = (isset($_POST["product_Stats"]) && $_POST["product_Stats"] == $row[0]) ? "selected" : "";
      echo "<option value='" . $row[0] . "'" . $selected . ">" . $row[1]. " ". $row[2]. " ". $row[3]. " ". $row[4]. " ". $row[5]. " ". $row[6]. " ". $row[7]."</option>";
    }
    ?>
  </select>
</div>
  <div class="form-group">
    <label for="product_Brand">Thương hiệu</label>
    <select class="form-control" id="product_Brand" name="product_Brand">
    <?php

    $getProductBrand_sql = "SELECT * FROM thuonghieu";
    // Array of options
    $productBrandList = mysqli_query($conn, $getProductBrand_sql);

    while ($row = mysqli_fetch_array($productBrandList)) {
      $selected = (isset($_POST["product_Brand"]) && $_POST["product_Brand"] == $row[0]) ? "selected" : "";
      echo "<option value='" . $row[0] . "'" . $selected . ">" . $row[1]. " ". $row[2]."</option>";
    }
    ?>
  </select>
  </div>
  <button type="submit" name="add" class="btn btn-primary">Tạo mới</button>
</form>
<?php
  if (isset($_POST["add"])) {
    $inputs = array($productID,$productName,$productPrice,$productImg,$productDesc,$productBrand,$productQuantity,$productStats,$productType);
    $filtered = array_filter($inputs, function (string $str) {
        return $str == "";
    });
    if (empty($filtered)) {
        //check if product id is exist
        $getProductID_sql = "SELECT MASP FROM sanpham;";
        $productIDList = mysqli_query($conn, $getProductID_sql);
        $check = true;
        while ($index = mysqli_fetch_array($productIDList, MYSQLI_NUM)) {
            if ($productID == $index[0])
                $check = false;
        }
        if ($check) {
            $productQuantity = (int) $productQuantity;
            $productPrice = (int) $productPrice;
            $addQuery = "INSERT INTO sanpham VALUES ('$productID','$productName',$productPrice,$productQuantity,'$productDesc','$productImg','$productType','$productBrand','$productStats')";

            mysqli_query($conn, $addQuery);
            echo "<h2>Product added successfully</h2>";
        } else
            echo "<span>Product ID existed</span>";
    } else
        echo "<span>Cannot leave any field blank</span>";
}
?>
<!-- End body -->

<?php
require("../shared/footer.php");
?>