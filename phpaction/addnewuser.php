<?php

    include '../database/dbsql.php';
    
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $userpassword = $_POST['userpassword']; 
    $usercontact = $_POST['usercontact'];
    $usertype = $_POST['usertype'];
    $userbranch = $_POST['userbranch'];
    $usergender = $_POST['usergender'];
    $mainbranch = $_POST['mainbranch'];

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
          '$usergender'
          )"
            
    );

    $insert_admin = (
        
        "INSERT INTO `tbl_users`
        (`username`,
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
         Curdate(),
         '$usercontact',
         '$usertype',
         '$mainbranch',
         '$firstname',
         '$lastname',
         '$usergender'
         )"

    );
    
    if ($usertype  == 'admin') { 
        query($insert_admin,$conn);
    }
    else
    {
        query($insert_sales,$conn);
    }
  
?>
