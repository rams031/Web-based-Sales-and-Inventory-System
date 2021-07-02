<?php

    include '../database/dbsql.php';

    $categoryid = $_POST['categoryid'];

    $delete_category = (

        "DELETE FROM 
        `tbl_category` 
        WHERE 
        `categoryid` = $categoryid"

    );

    query($delete_category,$conn);
?>