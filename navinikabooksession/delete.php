<?php

	require('config/config.php');
    require('config/db.php');
// Check For Submit
    // Get form data
    $delete_id = mysqli_real_escape_string($conn, $_GET['Bookid']);

    $query = "DELETE FROM book WHERE Bookid = {$delete_id}";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'viewbook.php');
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }

?>