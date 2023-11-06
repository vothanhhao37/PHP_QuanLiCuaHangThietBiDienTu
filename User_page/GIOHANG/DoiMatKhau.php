<?php
include '../Shared_Layout/header.php';
$result = mysqli_query($conn, "SELECT * FROM khachhang WHERE khachhang.MAKH = '{$_SESSION['MAKH']}'");
echo isset($_GET["check"]) ? $_GET["check"] : "";
?>


<title>Cài đặt thông tin</title>

<section class="section-pagetop bg-gray">
    <div class="container">
        <h2 class="title-page">Tài khoản của tôi</h2>
    </div> <!-- container //  -->
</section>


<section class="section-content padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                <nav class="list-group">
                    <a class="list-group-item " href="Detail.php"> Thông tin chung </a>
                    <a class="list-group-item" href="DonDatHang.php"> Đơn hàng </a>
                    <a class="list-group-item active" href="CaiDatThongTin.php">Cài đặt thông tin</a>
                </nav>
            </aside> <!-- col.// -->
            <?php if (mysqli_num_rows($result) <> 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <main class="col-md-9">

                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="CapNhatThongTin.php" class="row">
                                    <div class="col-md-9">
                                        <div class="form-row">
                                            <div class="col form-group">
                                                <label>Nhập mật khẩu hiện tại</label>
                                                <div>
                                                    <small class="text-danger"></small><br>
                                                    <input type="text" class="form-control" name="TENKH" id="TENKH" value="<?php if (isset($row['TENKH']))
                                                        echo $row['TENKH'] ?>">

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="col form-group">
                                                    <label>Nhập mật khẩu mới</label>
                                                    <div>
                                                        <small class="text-danger"></small><br>
                                                        <input type="text" class="form-control" name="TENKH" id="TENKH" value="<?php if (isset($row['TENKH']))
                                                        echo $row['TENKH'] ?>">

                                                    </div>
                                                </div>
                                                <div class="col form-group">
                                                    <label>Nhập lại mật khẩu m</label>
                                                    <div>
                                                        <input type="text" class="form-control" name="DIACHI" id="DIACHI" value="<?php if (isset($row['DIACHI']))
                                                        echo $row['DIACHI'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </main> <!-- col.// -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>



<?php
include '../Shared_Layout/footer.php';
?>