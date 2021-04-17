<?php
    include '../database/dbsql.php';

    $branchid = $_POST['branchid'];
 
	$delete_branch = (
        "DELETE FROM 
        `tbl_branch` 
        WHERE 
        `branchid` = '$branchid' "
    );

    mysqli_query($conn, $delete_branch) or die(mysqli_error($conn));
    if ($delete_branch) {echo "success";}
    else {echo ("ERROR :" . $delete_branch . "<br>" . mysqli_error($conn));}

    mysqli_close($conn);	
?>