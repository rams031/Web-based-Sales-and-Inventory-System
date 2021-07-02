<?php

    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];
    $productcode = $_POST['productcode'];
    $productcategory = $_POST['productcategory']; 
    $productname = $_POST['productname']; 
    $productprice = $_POST['productprice']; 
    $productwholesaleprice = $_POST['productwholesaleprice'];
    $productdescription = $_POST['productdescription'];

	$add_new_product= (
        "INSERT INTO `tbl_product`
        (
         `categoryid`,
         `branchid`,
         `productcode`,
         `productname`,
         `productprice`,
         `productwholesaleprice`,
         `productdescription`)
        VALUES (
         '$productcategory',
         '$branchid',
         '$productcode',
         '$productname',
         '$productprice',
         '$productwholesaleprice',
         '$productdescription' 
         )"

    );

    query($add_new_product,$conn)
?>