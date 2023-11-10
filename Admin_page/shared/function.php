<?php 

            function toPage(string $path, string $alert = "", string $alert_type = "none", string $id = "")
            {
                echo "<script>window.location.href = '$path". "?alert=" . urlencode($alert) . "&alert_type=" . urlencode($alert_type) . "&id=" . urlencode($id) ."'</script>";
            }
?>