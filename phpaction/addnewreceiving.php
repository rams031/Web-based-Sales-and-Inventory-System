<?php

    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];
    $referencenumber = $_POST['referencenumber'];
    $supplierid = $_POST['supplierid'];
    $date = $_POST['date']; 

	$add_new_recieving= (

        "INSERT INTO 
        `tbl_receiving`(
         `supplierid`,
         `branchid`,
         `referenceno`,
         `date`)
        VALUES (
         '$supplierid',
         '$branchid',
         '$referencenumber',
         '$date') "

    );

    query($add_new_recieving,$conn)
?>