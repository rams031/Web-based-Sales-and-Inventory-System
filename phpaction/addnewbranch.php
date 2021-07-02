<?php

    include '../database/dbsql.php';

    $branchemail = $_POST['branchemail']; 
    $branchregistrationnumber = $_POST['companyregno']; 
    $branchtinno = $_POST['tinno']; 
    $branchname = $_POST['branchname'];
    $branchcity = $_POST['branchcity'];
    $branchaddress = $_POST['branchaddress'];
    $branchdescription = $_POST['branchdescription'];
    $branchcontact = $_POST['branchcontact'];
    $branchtype = $_POST['branchtype'];

    $add_new_branch = (
            
        "INSERT INTO `tbl_branch`( 
            `branchname`, 
            `branchlocation`, 
            `branchaddress`, 
            `branchdescription`, 
            `datestarted`, 
            `branchtinnumber`, 
            `branchregistrationnumber`, 
            `branchemail`, 
            `branchcontact`,
            `branchtype`) 
        VALUES (
            '$branchname',
            '$branchcity',
            '$branchaddress',
            '$branchdescription',
            CURDATE(),
            '$branchtinno',
            '$branchregistrationnumber',
            '$branchemail',
            '$branchcontact',
            '$branchtype'
            )"

    );

    query($add_new_branch,$conn)
?>