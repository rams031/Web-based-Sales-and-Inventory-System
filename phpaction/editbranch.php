<?php

    include '../database/dbsql.php';
    
    $branchid = $_POST['branchid'];
    $branchemail = $_POST['branchemail']; 
    $branchregistrationnumber = $_POST['companyregno']; 
    $branchtinno = $_POST['tinno']; 
    $branchname = $_POST['branchname'];
    $branchcity = $_POST['branchcity'];
    $branchaddress = $_POST['branchaddress'];
    $branchdescription = $_POST['branchdescription'];
    $branchcontact = $_POST['branchcontact'];
    
	$update_branch = (
        "UPDATE 
         `tbl_branch` 
        SET 
         `branchname`='$branchname',
         `branchlocation`='$branchcity',
         `branchaddress`='$branchaddress',
         `branchdescription`='$branchdescription',
         `branchtinnumber`='$branchtinno',
         `branchregistrationnumber`='$branchregistrationnumber',
         `branchemail`='$branchemail',
         `branchcontact`='$branchcontact'
        WHERE 
         `branchid`='$branchid'"   
    );

    query($update_branch,$conn)
?>