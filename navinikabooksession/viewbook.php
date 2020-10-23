
<?php



include("auth_session.php");





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/viewbook.css" />
    <title>Document</title>
</head>
<body>
   
 <form   method="POST" action="<?php $_SERVER['PHP_SELF'];?>" >
<div>
<h1> <?php echo $_SESSION['usernamelogin'] ?>   
    <a href="logout.php">logut</a>
    <a href="index.php">home</a>
</h1>
</div>
<div>
 <span>sortby: </span>
<select name="sortby" >
<option value="adddate">DATE</option>
<option value="Bookid">BOOKID</option>
<option value="price">PRICE</option>
<option value="bookstatus">BOOKSTATUS</option>
</select>
<select name="sortbyascordesc" >
<option value="asc">ASC</option>
<option value="desc">DESC</option>
</select>
<!-- <span>sortbystatus: </span>
<select name="sortbystatus" >
<option value="buyed">buyed</option>
<option value="not buyed">not buyed</option>
</select> -->


<button type="submit" name="sortsubmit">sortsubmit</button>
</div>
</form>

    <table>

<tr>

<th>Id</th>

<th>name</th>
<th>bookimage</th>

<th>price</th>
<th>author</th>

<th>usermail</th>
<th>adddate</th>
<th>book status</th>
<th>update</th>
<th>delete</th>


</tr>

<?php
	require('config/config.php');
    require('config/db.php');
    $userlomail = $_SESSION['useremaillogin'];


    if(isset($_POST['sortsubmit'])){

        
            
        $sortvalue = $_POST['sortby']; 
        $ascordesc = $_POST['sortbyascordesc'];
        // $sortbystatus = $_POST['sortbystatus'];
 
       
       
    }
    else {
        # code...
        $sortvalue = 'bookid';
        $ascordesc = 'asc';
        
    }
$sql = "SELECT *  FROM book where usermail = '$userlomail'  order by $sortvalue  $ascordesc";
$result = mysqli_query($conn, $sql);


// echo "<table border='1'>

// <tr>

// <th>Id</th>

// <th>name</th>
// <th>bookimage</th>

// <th>price</th>
// <th>author</th>

// <th>usermail</th>
// <th>adddate</th>


// </tr>";

  $pic ="uploads";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td name='Bookid'>" . $row['Bookid'] . "</td>";
      
        echo "<td>" . $row['Bookname'] . "</td>";
   
              echo "<td>" .  "<img  height='120' width='140' src=".$row['bookimage']."  . />" . "</td>";

        // echo "<td>" .  "<img  height='100' width='100' src='uploads\uploads20170604_162439.jpg'  . />" . "</td>";
        // echo "<td>" .  '<img src='.$row['bookimage'].'/>' . "</td>";
        // echo "<td>" . $row['bookimage'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['usermail'] . "</td>";
        echo "<td>" . $row['adddate'] . "</td>";
        echo "<td>" . $row['bookstatus'] . "</td>";
       
        echo "<td><a id='update' href=".ROOT_URL."update.php?Bookid=" . $row['Bookid'] . ">update</a></td>";  
    //     echo "<td>
        
    //     <a name='delete' href=".ROOT_URL."/delete.php?Bookid=" . $row['Bookid'] . ">
    //     delete</a>
    // </td>";  
    echo "<td>
       <a  name='delete' id='delete' href=".ROOT_URL."delete.php?Bookid=" . $row['Bookid'] . ">
       Delete</a>

</td>";  

        // echo "<td> <button>delete </buton></td>";
        // echo "id: " . $row["bookid"]. " - bookName: " . $row["bookname"]. " " . "<br>";
    //  echo "hi";

    //  echo "<img src='uploads\'" .$row['bookimage']. "'/>";
    // echo "<img  height='300' width='300' src='uploads\uploads20170604_162439.jpg'    />";
    // echo "<img  height='300' width='300' src='uploads\ $row['d'] '  />";
    
}
} else {
    echo "0 results";
    echo $userlo;
}

mysqli_close($conn);
?>



</tr>
   </table>
   </body>
</html>
