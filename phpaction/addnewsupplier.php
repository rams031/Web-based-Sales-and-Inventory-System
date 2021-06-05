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
         `supplieraddress`,
         `suppliercontact`,
         `date`)
        VALUES (
         '$branchid',
         '$suppliername',
         '$supplieraddress',
         '$suppliercontact',
         '$supplierdate '
         )"

    );

    query($add_new_supplier,$conn)
?>