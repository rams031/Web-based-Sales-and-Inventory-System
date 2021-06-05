<?php
$user_data = ("SELECT * FROM `tbl_users` 
JOIN `tbl_branch` ON tbl_users.branchid=tbl_branch.branchid where tbl_branch.branchid = $branchid limit 1;");

$data = mysqli_query($conn, $user_data);

while ($row = mysqli_fetch_assoc($data)) {
    $_SESSION['usertype'] = $row["usertype"];
} 

?>