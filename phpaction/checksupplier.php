<?php

    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];

    $branch_query = ("SELECT * FROM `tbl_branch` WHERE branchid=$branchid LIMIT 1");
    $branch_data = mysqli_query($conn, $branch_query)
  
	$row = mysqli_fetch_assoc($branch_data);
    if ($result)
        { echo json_encode(array($row));}
    else {
        echo "Database Error";
    }

?>