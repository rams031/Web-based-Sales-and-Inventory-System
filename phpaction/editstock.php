<?php

    include '../database/dbsql.php';


    $stockid = $_POST['stockid'];
    $branchid = $_POST['branchid'];
    $productid = $_POST['productid'];
    $stockdate = $_POST['stockdate'];
     
	$edit_stock= (

         "UPDATE `tbl_stock`
         SET  
                `stockdate` = '$stockdate'
         WHERE  1 "

    );

    query($edit_stock,$conn)
?>