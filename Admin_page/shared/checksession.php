<?php
session_start();//nhớ
if (!(isset($_SESSION["user"]) && $_SESSION["pass"])) { 
       header("");
}
else echo "Session  is not set!";
?>