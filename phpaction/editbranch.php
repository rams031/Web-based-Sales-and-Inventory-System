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
    $employeesize = $_POST['employeesize'];
    $branchcontact = $_POST['branchcontact'];
    
	$update_branch = (
        "UPDATE 
         `tbl_branch` 
        SET 
         `branchname`='$branchname',
         `branchlocation`='$branchcity',
         `branchaddress`='$branchaddress',
         `branchdescription`='$branchdescription',
         `employeesize`='$employeesize',
         `branchtinnumber`='$branchtinno',
         `branchregistrationnumber`='$branchregistrationnumber',
         `branchemail`='$branchemail',
         `branchcontact`='$branchcontact'
        WHERE 
         `branchid`='$branchid'"   
    );


    mysqli_query($conn, $update_branch) or die(mysqli_error($conn));
    if ($update_branch) {echo "success";}
    else {echo ("ERROR :" . $update_branch . "<br>" . mysqli_error($conn));}

    mysqli_close($conn);	

?>