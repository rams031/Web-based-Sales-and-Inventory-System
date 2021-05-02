<?php
    include '../database/dbsql.php';

    $admin = "main";
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $userpassword = $_POST['userpassword']; 
    $usercontact = $_POST['usercontact'];
    $usertype = $_POST['usertype'];
    $userbranch = $_POST['userbranch'];
    $usergender = $_POST['usergender'];


    $insert_sales = (
        "INSERT INTO 
            `tbl_users` (
            `username`, 
            `userpassword`, 
            `datecreated`, 
            `contacts`, 
            `usertype`, 
            `branchid`, 
            `firstname`, 
            `lastname`, 
            `gender`)
        VALUES (
            '$username',
            '$userpassword',
             CURDATE(),
            '$usercontact',
            '$usertype',
            '$userbranch',
            '$firstname',
            '$lastname',
            '$usergender')"
    );


    mysqli_query($conn, $insert_sales) or die(mysqli_error($conn));
    if ($insert_sales) {echo "success";}
    else {echo ("ERROR :" . $insert_sales . "<br>" . mysqli_error($conn));}
    

    mysqli_close($conn);	

?>