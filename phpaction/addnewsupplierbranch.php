<?php

    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];
    $supplierid = $_POST['supplierid'];
    $suppliername = $_POST['suppliername'];
    $supplieraddress = $_POST['supplieraddress']; 
    $suppliercontact = $_POST['suppliercontact'];
    $supplierdate = $_POST['supplierdate']; 

	$add_new_supplier= (
        
        "INSERT INTO 
        `tbl_supplier`(
         `branchid`,
         `branchsupplierid`,
         `suppliername`,
         `supplieraddress`,
         `suppliercontact`,
         `date`)
        VALUES (
         '$branchid',
         '$supplierid',
          NULLIF('$suppliername',''),
          NULLIF('$supplieraddress',''),
          NULLIF('$suppliercontact',''),
         '$supplierdate '
         )"

    );

    query($add_new_supplier,$conn)
?>