<?php
    session_start();
    session_destroy();
    header('location:User_Login/Login.php');
?>
