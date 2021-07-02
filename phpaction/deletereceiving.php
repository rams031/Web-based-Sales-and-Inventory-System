<?php

    include '../database/dbsql.php';

    $receivingid = $_POST['receivingid'];

    $delete_receiving = (

        "DELETE FROM 
        `tbl_receiving` 
        WHERE 
        `receivingid` = $receivingid"

    );

    query($delete_receiving,$conn);
?>