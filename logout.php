<?php
session_start();
session_destroy();
echo "<script>window.open('home.php','_self')</script>";
?>