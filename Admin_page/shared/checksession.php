<?php
session_start();//nhớ
if (!(isset($_SESSION["user"]) && $_SESSION["pass"])) { 
       header(header: "");
}
else echo "Session  is not set!";
?>