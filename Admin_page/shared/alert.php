<?php
        if (isset($_GET["alert"]) && isset($_GET["alert_type"]))
        {
            $alert_type = $_GET["alert_type"];
            $alert = $_GET["alert"];
            echo "<p class='$alert_type'>$alert</p>";
        }
?>
