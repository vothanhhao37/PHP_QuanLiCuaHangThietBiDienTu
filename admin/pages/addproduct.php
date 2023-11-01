<?php
require("../layout/admin_header.php");
require("../../db_connect.php")
  ?>
<!-- Start body -->
<?php

?>
<h1 class="heading"></h1>
<form action="" method="get">
  <div class="form-group">
    <label for="productID">Mã sản phẩm</label>
    <input type="text" class="form-control" name="productID" id="productID" placeholder="Enter product ID">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tên sản phẩm</label>
    <input type="password" class="form-control" id="productName" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Đơn giá</label>
    <input type="text" class="form-control" name="productid" placeholder="Enter product ID">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Số lượng</label>
    <input type="text" class="form-control" name="productid" placeholder="Enter product ID">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mô tả</label>
    <textarea type="text" class="form-control" row="5" name="productid" placeholder="Enter product ID"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ảnh</label>
    <input type="file" class="form-control" name="productid">
  </div>
  <div class="form-group">
    <label for="product_Type">Loại sản phẩm</label>
    <select class="form-control" id="product_Type">
    <?php

    $getProductType_sql = "SELECT * FROM loaisanpham";
    // Array of options
    $productTypeList = mysqli_query($conn, $getProductType_sql);

    while ($row = mysqli_fetch_array($productTypeList)) {
      $selected = (isset($_GET["product_Type"]) && $_GET["product_Type"] == $row[0]) ? "selected" : "";
      echo "<option value='" . $row[0] . "'" . $selected . ">" . $row[1] . "</option>";
    }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="product_Stats">Thông số kỹ thuật</label>
    <select class="form-control" id="product_Stats">
    <?php

    $getProductStats_sql = "SELECT * FROM thongsokythuat";
    // Array of options
    $productStatsList = mysqli_query($conn, $getProductStats_sql);

    while ($row = mysqli_fetch_array($productStatsList)) {
      $selected = (isset($_GET["product_Stats"]) && $_GET["product_Stats"] == $row[0]) ? "selected" : "";
      echo "<option value='" . $row[0] . "'" . $selected . ">" . $row[1]. " ". $row[2]. " ". $row[3]. " ". $row[4]. " ". $row[5]. " ". $row[6]. " ". $row[7]."</option>";
    }
    ?>
  </select>
</div>
  <div class="form-group">
    <label for="product_Brand">Thương hiệu</label>
    <select class="form-control" id="product_Brand">
    <?php

    $getProductBrand_sql = "SELECT * FROM thuonghieu";
    // Array of options
    $productBrandList = mysqli_query($conn, $getProductBrand_sql);

    while ($row = mysqli_fetch_array($productBrandList)) {
      $selected = (isset($_GET["product_Brand"]) && $_GET["product_Brand"] == $row[0]) ? "selected" : "";
      echo "<option value='" . $row[0] . "'" . $selected . ">" . $row[1]. " ". $row[2]."</option>";
    }
    ?>
  </select>
  </div>
  <button type="submit" name="add" class="btn btn-primary">Tạo mới</button>
</form>
<!-- End body -->

<?php
require("../layout/admin_footer.php");
?>