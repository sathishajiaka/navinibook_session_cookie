<?php
    session_start();
    if(!isset($_SESSION["usernamelogin"])) {
        header("Location: login.html");
        exit();
    }
?>
