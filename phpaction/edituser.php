<?php

    include '../database/dbsql.php';
    
    $usercontact = $_POST['usercontact'];
    $usergender = $_POST['usergender'];
    $userpassword = $_POST['userpassword'];
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $userid = $_POST['userid'];


    $update_user = (

        "UPDATE `tbl_users`
        SET    
               `username` = '$username',
               `userpassword` = '$userpassword',
               `contacts` = '$usercontact',
               `firstname` = '$firstname',
               `lastname` = '$lastname'
        WHERE  userid =  $userid"

    );

    query($update_user,$conn)
?>