<?php
    session_start(); 
    $branchid = $_SESSION['branchid'];

    include '../../database/dbsql.php';

    $inventoryid = $_POST['inventoryid'];

	$quantitycheck = ("SELECT SUM(tbl_inventory.quantity) as sumofquantity, 
    tbl_product.productname, tbl_product.productprice, tbl_product.productcode, 
    tbl_inventory.inventoryid,tbl_inventory.quantity, tbl_supplier.suppliername  FROM `tbl_inventory`
    JOIN `tbl_product` ON tbl_product.productid=tbl_inventory.productid 
    JOIN `tbl_receiving` ON tbl_receiving.receivingid=tbl_inventory.receivingid
    JOIN `tbl_supplier` ON tbl_supplier.supplierid=tbl_receiving.supplierid
    WHERE tbl_inventory.branchid = $branchid && tbl_inventory.inventoryid = $inventoryid GROUP BY tbl_product.productcode LIMIT 1");

    $result = mysqli_query($conn, $quantitycheck)or die(mysqli_error($conn));
    
	$row = mysqli_fetch_assoc($result);
        if ($result){
            echo $row['quantity'];
        }
        else {
            echo "Database Error";
        }
?>