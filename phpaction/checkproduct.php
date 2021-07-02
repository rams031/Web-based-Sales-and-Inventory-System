<?php

    include '../database/dbsql.php';

    $name = $_POST['name'];

    $productname_query = ("SELECT * FROM `tbl_product` WHERE productname='$name' LIMIT 1");
    $product_data = mysqli_query($conn, $productname_query)
  
	$row = mysqli_fetch_assoc($product_data);
    if ($result)
        if ($row['productname'] == $name) {echo $name}
        else {echo "available";}
    else {
        echo "Database Error";
    }

?>