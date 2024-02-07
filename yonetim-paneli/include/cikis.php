<?php
    @session_destroy();
    @ob_end_flush();
    echo "<script>location='http://localhost/yonetim-paneli/login.php';</script>";
?>