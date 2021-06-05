

<?php

    include '../database/dbsql.php';
    
    $branchid = $_POST['branchid'];
    $customercheckout = $_POST['customercheckout'];
    $checkoutdate = $_POST['checkoutdate']; 
    $productcheckout = $_POST['productcheckout'];
    $quantitycheckout = $_POST['quantitycheckout'];
    $totalamountcheckout = $_POST['totalamountcheckout'];

	$add_new_order= (

        "INSERT INTO `tbl_order`(
             `branchid`,
             `customerid`,
             `inventoryid`,
             `quantity`,
             `totalamount`,
             `orderdate`)
          VALUES (
             '$branchid',
             '$customercheckout',
             '$productcheckout',
             '$quantitycheckout',
             '$totalamountcheckout',
             '$checkoutdate'
             )"

    );
    
    query($add_new_order,$conn)
?>


 