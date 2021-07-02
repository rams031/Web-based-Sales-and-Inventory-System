<?php

    include '../database/dbsql.php';

    $inventoryid = $_POST['inventoryid'];
    $quantity = $_POST['quantity'];
    $stockid = $_POST['stockid'];
 
    $update_stock= (

        "UPDATE `tbl_stock`
        SET    
            `stockquantity` = stockquantity - $quantity 
        WHERE  stockid = $stockid"

    );

    query($update_stock,$conn);
    

    $delete_branch = (

        "DELETE FROM 
        `tbl_inventory` 
        WHERE 
        `inventoryid` = $inventoryid"

    );

    query($delete_branch,$conn);
?>