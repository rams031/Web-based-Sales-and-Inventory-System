<?php

    include '../database/dbsql.php';
    
    $categoryname = $_POST['categoryname'];
    $categorydescription = $_POST['categorydescription']; 
    $branchid = $_POST['branchid'];

	$add_new_category= (

        "INSERT INTO 
        `tbl_category`(
         `branchid`,
         `categoryname`,
         `categorydescription`)
        VALUES (
         '$branchid',
         '$categoryname',
         '$categorydescription'
        )"

    );
    
    query($add_new_category,$conn)
?>