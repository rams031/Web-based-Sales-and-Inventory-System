<?php
    include '../database/dbsql.php';

    $branchemail = $_POST['branchemail']; 
    $branchregistrationnumber = $_POST['companyregno']; 
    $branchtinno = $_POST['tinno']; 
    $branchname = $_POST['branchname'];
    $branchcity = $_POST['branchcity'];
    $branchaddress = $_POST['branchaddress'];
    $branchdescription = $_POST['branchdescription'];
    $employeesize = $_POST['employeesize'];
    $branchcontact = $_POST['branchcontact'];


    $add_new_branch = (
            
        "INSERT INTO `tbl_branch`( 
            `branchname`, 
            `branchlocation`, 
            `branchaddress`, 
            `branchdescription`, 
            `datestarted`, 
            `employeesize`, 
            `branchtinnumber`, 
            `branchregistrationnumber`, 
            `branchemail`, 
            `branchcontact`) 
        VALUES (
            '$branchname',
            '$branchcity',
            '$branchaddress',
            '$branchdescription',
            CURDATE(),
            '$employeesize',
            '$branchtinno',
            '$branchregistrationnumber',
            '$branchemail',
            '$branchcontact')"

    );
    
    mysqli_query($conn, $add_new_branch) or die(mysqli_error($conn));
    if ($add_new_branch) {echo "success";}
    else {echo ("ERROR :" . $add_new_branch . "<br>" . mysqli_error($conn));}

    mysqli_close($conn);


?>