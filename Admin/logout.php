<?php
    session_start();
    session_destroy();
    header('location:Admin_Login/Login.php');
?>
