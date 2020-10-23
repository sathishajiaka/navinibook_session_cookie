

<?php

require('config/config.php');
require('config/db.php');




if (isset($_POST['submit'])) {



    // header('Location: page2.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // session_start();
     // Start the session

		// $_SESSION['username'] = htmlentities($_POST['username']);
		// $_SESSION['email'] = htmlentities($_POST['email']);

		// header('Location: page2.php');
	
     
        $sql = "select * from users where username='$username'AND email = '$email'  AND password='" . md5($password) . "'";
       
        $result = mysqli_query($conn, $sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {  
            

    setcookie('usernamecookie', $username, time()+3600); // 1 Hour
    setcookie('usermailcookie', $email, time()+3600); // 1 Hour
            header('Location: '.ROOT_URL.'');
    
        } else {
            echo "<div class='form'>
                  <h3>User name or password or email not match <a href=login.html>please login again</a> </h3>
                  </div>";
        }


      

        

   
}
    ?>




