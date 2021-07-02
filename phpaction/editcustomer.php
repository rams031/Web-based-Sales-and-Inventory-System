<?php
  
  include '../database/dbsql.php';

  $customerid = $_POST['customerid'];
  $customername = $_POST['customername'];
  $customerlocation = $_POST['customerlocation'];
  $customercontact = $_POST['customercontact'];
  $customerdate = $_POST['customerdate'];

	$update_customer = (

         "UPDATE `tbl_customer`
         SET    
                `customername` = '$customername',
                `customeraddress` = NULLIF('$customerlocation',''),
                `customercontact` = NULLIF('$customercontact',''),
                `customerdate` = '$customerdate'
         WHERE  customerid =  customerid"

    );

    query($update_customer,$conn)
?>