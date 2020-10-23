
<?php


include('checkcookie.php');


$userlomail = $_COOKIE['usermailcookie'];
	require('config/config.php');
  require('config/db.php');
  
  
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


  $msg = "";

	// Check For Submit
	if(isset($_POST['submit'])){

    if (empty($_POST["usermail"])) {
      $emailErr = "Email is required";
    } else {
      // check if e-mail address is well-formed
    
       # code...
    
    }
      

        echo 'submitted';
      echo $msg;


        	// Get image name
  	$bookimage = $_FILES['bookimage']['name'];
  
  	// image file directory
  	$target = "uploads/".basename($bookimage);



		// Get form data
    $bookname = mysqli_real_escape_string($conn, $_POST['bookname']);
    
		// $bookimage = mysqli_real_escape_string($conn, $_POST['bookimage']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$author = mysqli_real_escape_string($conn,$_POST['author']);

		$query = "INSERT INTO book(bookname, bookimage, price, author, usermail,bookstatus)
      VALUES('$bookname', '$target', '$price', '$author', '$userlomail','not buyed')";


		if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'viewbook.php');

         
      
    

		} else {
			echo 'ERROR: '. mysqli_error($conn);
    }

    if (move_uploaded_file($_FILES['bookimage']['tmp_name'], $target)) {
    echo  $msg = "Image uploaded successfully";

    }else{
   echo   $msg = "Failed to upload image";
    }

  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

</style>

    <title>add book</title> 
    <link rel="stylesheet" href="css/addbook.css"/>

</head>
<body>
    
    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
  <div class="container">
    
<h1>
  <?php echo $_COOKIE['usernamecookie'] ?> 
<a href="deletecookie.php">logout</a>   

</h1>
    
    
  <label for="bookname" ><b>book name</b></label>
    <input type="text" placeholder="Enter bookname" name="bookname" id="bookname" required>
  <label for="bookimage"  class="adi"><b> add image</b></label>
    <input type="file"  placeholder="Select bookimage" name="bookimage" id="bookimage" onchange="loadfile(event)"/> 

    <img id="preimage" width="350" height="150" style="display:none;"/>

    <script>
        function loadfile(event){
var output =document.getElementById("preimage");
output.src=URL.createObjectURL(event.target.files[0]);
output.style.display = "block";
        }
    </script>

    <label for="price"><b>price</b></label>
    <input type="number" placeholder="Enter price" name="price" id="price" >

  <label for="author"><b>author</b></label>
    <input type="text" placeholder="Enter author" name="author" id="author" >

   
 

    <button type="submit" name="submit" value="submit" class="registerbtn">submit</button>
  </div>
<!--   
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div> -->
</form>
</body>
</html>

