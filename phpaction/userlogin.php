<?php
    session_start();
    include '../database/dbsql.php';

    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    $remember = $_POST['cookie'];
 
	$user_login = (

        "SELECT * FROM 
         `tbl_users` 
        WHERE 
         `username` = '$username' && 
         `userpassword` = '$userpassword' LIMIT 1"

    );

    $data = mysqli_query($conn, $user_login);
    $row = mysqli_fetch_assoc($data);
    if (mysqli_num_rows($data) == 1) {
        
        if ($row['usertype'] == "admin") {
            echo "admin";
            $_SESSION['usertype']= $row['usertype'];
            $_SESSION['userid'] = $row['userid'];
			$_SESSION['name'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];


            if ($remember == "yes") {
                
            }            
            
        } else {
            echo "sales";
            $_SESSION['usertype']= $row['usertype'];
            $_SESSION['userid'] = $row['userid'];
			$_SESSION['name'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
        }
    } else {
        echo "error";
    }
    

    mysqli_close($conn);	
?>