<?php
  
  include '../database/dbsql.php';
  
  $categoryid = $_POST['categoryid'];
  $categoryname = $_POST['categoryname'];
  $categorydescription = $_POST['categorydescription']; 

	$update_category = (

        "UPDATE 
          `tbl_category`
        SET    
          `categoryname` = '$categoryname',
          `categorydescription` = '$categorydescription'
        WHERE  
          `categoryid` = $categoryid"

    );

    query($update_category,$conn)
?>