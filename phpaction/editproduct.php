<?php

    include '../database/dbsql.php';
    
    $productid = $_POST['productid'];
    $productcode = $_POST['productcode'];
    $productcategory = $_POST['productcategory']; 
    $productname = $_POST['productname']; 
    $productprice = $_POST['productprice']; 
    $productwholesaleprice = $_POST['productwholesaleprice'];
    $productdescription = $_POST['productdescription'];
    
	$update_product = (

        "UPDATE 
          `tbl_product`
        SET    
          `categoryid` = '$productcategory',
          `productcode` = '$productcode',
          `productname` = '$productname',
          `productprice` = '$productprice',
          `productwholesaleprice` = '$productwholesaleprice',
          `productdescription` = '$productdescription'
        WHERE `productid` = $productid" 

    );

    query($update_product,$conn)
?>