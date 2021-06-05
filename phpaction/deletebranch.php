<?php

    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];
 
	$delete_branch = (

        "DELETE FROM 
        `tbl_branch` 
        WHERE 
        `branchid` = '$branchid' "

    );

    query($delete_branch,$conn)
?>