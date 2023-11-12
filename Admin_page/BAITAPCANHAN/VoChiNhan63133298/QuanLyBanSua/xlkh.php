<?php

if (isset($_POST["edit"]))
{
    $makh = $_POST["makh"];
    echo "chinh sua $makh";
}

if (isset($_POST["delete"]))
{
    $makh = $_POST["makh"];
    echo "xoa $makh";
}

?>