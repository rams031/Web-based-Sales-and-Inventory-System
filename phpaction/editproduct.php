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

    mysqli_query($conn, $update_product) or die(mysqli_error($conn));
    if ($update_product) {echo "success";}
    else {echo ("ERROR :" . $update_product . "<br>" . mysqli_error($conn));}

    mysqli_close($conn);	

?>