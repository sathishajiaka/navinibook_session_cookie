

<?php

require('config/config.php');
require('config/db.php');




if (isset($_POST['submit'])) {




    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    session_start();
    //  Start the session

	
	
     
        $sql = "select * from users where username='$username'AND email = '$email'  AND password='" . md5($password) . "'";
       
        $result = mysqli_query($conn, $sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {  
            	$_SESSION['usernamelogin'] = htmlentities($_POST['username']);
		$_SESSION['useremaillogin'] = htmlentities($_POST['email']);

            header('Location: '.ROOT_URL.'');
    
        } else {
            echo "<div class='form'>
                  <h3>User name or password or email not match <a href=login.html>please login again</a> </h3>
                  </div>";
        }


      

        

   
}
    ?>




