<?php
    session_start();

    if(isset($_SESSION['email_admin'])){

        unset($_SESSION['email_admin']);
    }

    header("Location: admin_login.php");
    die;
?>