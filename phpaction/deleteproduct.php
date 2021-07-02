<?php

    include '../database/dbsql.php';

    $productid = $_POST['productid'];

    $delete_product = (

        "DELETE FROM 
        `tbl_product` 
        WHERE 
        `productid` = $productid"

    );

    query($delete_product,$conn);
?>