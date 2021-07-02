<?php

    include '../database/dbsql.php';
    
    $receivingid = $_POST['receivingid'];
    $supplierid = $_POST['supplierid'];
    $referencenumber = $_POST['referencenumber']; 
    $date = $_POST['date']; 
    
	$update_receiving = (

        "UPDATE `tbl_receiving`
        SET    
               `supplierid` = '$supplierid',
               `referenceno` = '$referencenumber',
               `date` = '$date'
        WHERE  receivingid = $receivingid "

    );

    query($update_receiving,$conn)
?>