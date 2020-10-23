





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
<?php
    
require('config/config.php');
require('config/db.php');

$message='';
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
      
        if (empty($username)) {
            echo "Name is empty";
        } 
        
        if (empty($email)) {
            echo "email is empty";
        } 
        
        if (empty($password)) {
            echo "password is empty";
        } 

    
        $sql = "INSERT INTO users (username,email,password)
        VALUES ('$username','$email','" . md5($password) . "')";


$result   = mysqli_query($conn, $sql);
if ($result) {
    header('Location: '.ROOT_URL.'login.html');


} else {       
    
    
    echo "<h3>User name or Email id already exists <a href='register.php'>please Register again</a> </h3>";

}


        
       
        

         
        

      

            
                
    } else {
?>
<div>
    
<h1>Register form</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <label>Username</label>
    <input type="text" name="username" required maxlength=20/>
    <label>Email</label>

    <input  type="email" name="email" required />
    <label>password</label>
    <input type="password" name="password" required/>
    <button type="submit" name="submit"> Register</button><a href="login.html">already have an account</a>
</div>
    
    </form>
<?php
    }
?>
</body>
</html>
