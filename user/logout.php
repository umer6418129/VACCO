<?php
session_start();
session_destroy();
echo '<script>alert("Logout")</script>';
header('location:index.php');
?>