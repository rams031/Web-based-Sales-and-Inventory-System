<?php
    include '../database/dbsql.php';

    $productid = $_POST['productid'];
    $branchid = $_POST['branchid'];
	
	$stock_check = ("SELECT * FROM `tbl_stock` WHERE branchid = '$branchid' && productid='$productid' LIMIT 1");
    $result = mysqli_query($conn, $stock_check )or die(mysqli_error($conn));
    
	$row = mysqli_fetch_assoc($result);
        if ($result)
	    	if ($row['productid'] === $productid) {echo "existing";}
            else {echo "available";}
        else {
            echo "Database Error";
        }
?>