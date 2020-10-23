






<?php 
// include("auth_session.php");


include('checkcookie.php');



	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$update_id = mysqli_real_escape_string($conn, $_POST['Bookid']);
		$title = mysqli_real_escape_string($conn, $_POST['Bookname']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);
		$bookstatus = mysqli_real_escape_string($conn, $_POST['bookstatus']);

		$query = "UPDATE book SET 
					Bookname='$title',
					price='$price',
					author='$author',
					bookstatus='$bookstatus'
					
						WHERE Bookid = {$update_id}";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'viewbook.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['Bookid']);

	// Create Query
	$query = 'SELECT * FROM book WHERE Bookid = '.$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/updatebook.css" />

	<title>Document</title>
</head>
<body>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div>

		<h1>Update Zone</h1>

				<label>bookid</label>
			
				<input type="text" readonly name="Bookid" class="hide"  value="<?php echo $post['Bookid']; ?>">
			
				<label>Title</label>
				<input type="text" name="Bookname"  value="<?php echo $post['Bookname']; ?>">
		
				<label>price</label>
				<input type="text" name="price"  value="<?php echo $post['price']; ?>">
			
				<label>author</label>
				<input type="text" name="author" value="<?php echo $post['author']; ?>">
			
				<label>bookstatus</label>
				<input type="text" name="bookstatus" value="<?php echo $post['bookstatus']; ?>">
			
		
			<button type="submit" name="submit" value="Submit"> submit</button>
			</div>
		</form>

</body>
</html>
	