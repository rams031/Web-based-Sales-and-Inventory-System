<?php

    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];
    $suppliername = $_POST['suppliername'];
    $supplieraddress = $_POST['supplieraddress']; 
    $suppliercontact = $_POST['suppliercontact'];
    $supplierdate = $_POST['supplierdate']; 

	$add_new_supplier= (
        
        "INSERT INTO 
        `tbl_supplier`(
         `branchid`,
         `suppliername`,
         `branchsupplierid`,
         `supplieraddress`,
         `suppliercontact`,
         `date`)
        VALUES (
         '$branchid',
         '$suppliername',
         NULL,
         '$supplieraddress',
         '$suppliercontact',
         '$supplierdate '
         )"

    );

    query($add_new_supplier,$conn)
?>