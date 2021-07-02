<?php
    session_start(); 
    $branchid = $_SESSION['branchid'];

    include '../../database/dbsql.php';

    $stockid = $_POST['stockid'];

	$product_check = ("SELECT * FROM `tbl_stock` 
    JOIN `tbl_product` ON tbl_product.productid=tbl_stock.productid 
    WHERE tbl_stock.branchid = $branchid && tbl_stock.stockid = $stockid LIMIT 1");

    $result = mysqli_query($conn, $product_check)or die(mysqli_error($conn));
    
	$row = mysqli_fetch_assoc($result);
        if ($result){
            echo $row['productname'];
        }
        else {
            echo "Database Error";
        }
?>