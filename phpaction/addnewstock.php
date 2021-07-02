<?php

    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];
    $productid = $_POST['productid'];
    $stockdate = $_POST['stockdate'];
     
	$add_new_stock= (

        "INSERT INTO 
        `tbl_stock` (
         `productid`,
         `branchid`,
         `stockquantity`,
         `stockdate`)
        VALUES (
         '$productid',
         '$branchid',
         0,
         '$stockdate')"

    );

    query($add_new_stock,$conn)
?>