<html>

<body>
    <h1>Tìm Sách</h1>
    <form action="" Method="Post">
        Từ Khóa:
        <input type="text" name="txtTuKhoa">
        <input type="submit" value="Tìm">
    </form>
</body>

</html>
<?php
if (isset($_POST["txtTuKhoa"])) {
    $sTuKhoa = $_POST["txtTuKhoa"];
    echo "<h1> Từ khóa tìm sách là:$sTuKhoa </h1>";
}
?>