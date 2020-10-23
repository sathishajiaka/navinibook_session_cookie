
<?php 
include('checkcookie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navinikabook</title>
    <link rel="stylesheet" href="css/index.css"/>
  
</head>
<body>
<h1>
  <?php echo $_COOKIE['usernamecookie'] ?> 
<a href="deletecookie.php">logout</a>   

</h1>








    <div>
    <button>
            <a href="addbook.php">add book</a>
        </button> 
        </div>

           
<div>           <button>
            <a href="viewbook.php">view books</a>
        </button>
    </div>
</body>
</html>
