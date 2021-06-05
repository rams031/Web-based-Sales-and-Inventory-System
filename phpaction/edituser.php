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

    query($insert_sales,$conn)
?>