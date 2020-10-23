<?php


if($_COOKIE !== 'usernamecookie'){
    header("Location: login.html");
    exit();
}

    // setcookie('username', $username, time()+3600); // 1 Hour

    // header('Location: page2.php');


?>