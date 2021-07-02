<?php

    include '../database/dbsql.php';

    $supplierid = $_POST['supplierid'];

    $delete_supplier = (

        "DELETE FROM 
        `tbl_supplier` 
        WHERE 
        `supplierid` = $supplierid"

    );

    query($delete_supplier,$conn);
?>