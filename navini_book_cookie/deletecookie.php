<?php


// Delete Cookie
setcookie('usernamecookie',$_COOKIE['usernamecookie'],time() -6);
setcookie('usermailcookie', $_COOKIE['usermailcookie'],time() -6);

// if(!isset($_COOKIE['usernamecookie'])){


header("Location: login.html");
// exit();

// }
?>