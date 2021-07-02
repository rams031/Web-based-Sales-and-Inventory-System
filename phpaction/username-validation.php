<?php
    include '../database/dbsql.php';

    $username = $_POST['username'];
	
	$username_check = ("SELECT * FROM `tbl_users` WHERE username='$username' LIMIT 1");
    $result = mysqli_query($conn, $username_check )or die(mysqli_error($conn));
    
	$row = mysqli_fetch_assoc($result);
        if ($result)
	    	if ($row['username'] === $username) {echo "existing";}
            else {echo "available";}
        else {
            echo "Database Error";
        }
?>