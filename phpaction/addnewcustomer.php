<?php

    include '../database/dbsql.php';
    
    $branchid = $_POST['branchid'];
    $customername = $_POST['customername'];
    $customerlocation = $_POST['customerlocation']; 
    $customercontact = $_POST['customercontact'];
    $customerdate = $_POST['customerdate'];

	$add_new_customer= (

        "INSERT INTO 
        `tbl_customer`(
          `branchid`,
          `customername`,
          `customeraddress`,
          `customercontact`,
          `dateadded`)
       VALUES(
          '$branchid',
          '$customername',
          NULLIF('$customerlocation',''),
          NULLIF('$customercontact',''),
          '$customerdate'
          )"

    );
    
    query($add_new_customer,$conn)
?>


 