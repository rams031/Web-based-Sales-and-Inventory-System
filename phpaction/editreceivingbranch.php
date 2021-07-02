<?php

    include '../database/dbsql.php';
    
    $receivingid = $_POST['receivingid'];
    $referencenumber = $_POST['referencenumber']; 
    $date = $_POST['date']; 
    
	$update_receiving = (

        "UPDATE `tbl_receiving`
        SET    
               `referenceno` = '$referencenumber',
               `date` = '$date'
        WHERE  receivingid = $receivingid "

    );

    query($update_receiving,$conn)
?>