<?php

    include '../database/dbsql.php';
    //header('Content-Type:application/json;');
    $mydate = $_POST["mydate"];
    $customerid = $_POST["customerid"];
    $branchid = $_POST["branchid"];
    $datecheckout = $_POST["datecheckout"];
    $totalamount = $_POST["totalamount"];
    $moneytendered = $_POST["moneytendered"];
    $balance = $_POST["balance"];
    $checkouttotalamount = $_POST["checkouttotalamount"];
    $query = '';
    $updatequery = '';

    $transaction_tracker = ("SELECT count(transactionid) as transactionidcount FROM `tbl_transaction` ");
    $transaction_sum = mysqli_query($conn, $transaction_tracker);
    while ($row = mysqli_fetch_assoc($transaction_sum)) {
        $transid =  $row["transactionidcount"] + 1;
    }

    for($i = 0; $i < count($mydate); $i++){ 

        $inventoryid_clean = json_encode($mydate[$i]['inventoryid']);
        $productname_clean = json_encode($mydate[$i]['proname']);
        $quantity_clean = json_encode($mydate[$i]['quantity']);
        $productprice_clean = json_encode($mydate[$i]['productprice']);
        $totalamount_clean = json_encode($mydate[$i]['totalamount']);

        if ($inventoryid_clean != ""){

            $query .= 
            "INSERT INTO `tbl_order`
            (`branchid`,
             `transactionid`,
             `customerid`,
             `inventoryid`,
             `orderquantity`,
             `totalamount`,
             `orderdate`)
            VALUES (
             '$branchid',
             '$transid',
             '$customerid',
             $inventoryid_clean,
             $quantity_clean,
             $totalamount_clean,
             '$datecheckout');
            ";

        }
    }

    if($query != '') {

     if(mysqli_multi_query($conn, $query))
     {
        if ($query) { 
            echo "success"; 
        } else { 
            echo ("ERROR :" . $query . "<br>" . mysqli_error($conn)); 
        }

     } else {
        echo ("ERROR :" . $query . "<br>" . mysqli_error($conn));
     }

     while (mysqli_next_result($conn)){;}

    }

    for($i = 0; $i < count($mydate); $i++){ 

        $inventoryid_clean = json_encode($mydate[$i]['inventoryid']);
        $productname_clean = json_encode($mydate[$i]['proname']);
        $quantity_clean = json_encode($mydate[$i]['quantity']);
        $productprice_clean = json_encode($mydate[$i]['productprice']);
        $totalamount_clean = json_encode($mydate[$i]['totalamount']);

        if ($inventoryid_clean != ""){
            
            $updatequery .= 
            "UPDATE 
                `tbl_inventory`
             SET    
                `quantity` = quantity - $quantity_clean
            WHERE  inventoryid = $inventoryid_clean;";

        }

    }

    if($updatequery != '')
    {
        
        if(mysqli_multi_query($conn, $updatequery)) {
            if ($updatequery) { 
                echo "success"; 
            } else { 
                echo ("ERROR :" . $updatequery . "<br>" . mysqli_error($conn)); 
            }
        } else {
           echo ("ERROR :" . $updatequery . "<br>" . mysqli_error($conn));
        }

        while (mysqli_next_result($conn)){;}

    }

    $add_new_transaction = (

        "INSERT INTO 
        `tbl_transaction`(
         `customerid`,
         `branchid`,
         `orderamount`,
         `moneytendered`,
         `balance`,
         `date`)
        VALUES (
         '$customerid',
         '$branchid',
         '$totalamount',
         '$moneytendered',
         '$balance',
         CURDATE()) "

    );

    mysqli_query($conn, $add_new_transaction) or die(mysqli_error($conn));
    if ($add_new_transaction) {
        echo "success";
    }
    else {
        echo ("ERROR :" . $add_new_transaction . "<br>" . mysqli_error($conn));
    }

    mysqli_close($conn);






    //try {
    //    for($x = 0; $x < count($mydate); $x++){ 
    //        $query = "INSERT INTO `testdb` (`testnum`) VALUES ("$inventoryid_clean[$x]")"
    //        mysqli_multi_query($conn, $query) or die(mysqli_error($conn));
    //    }
    //    
    //}catch(Exception $e){
    //    echo "failed";
    //}
    //echo $data;

    //if($query != '')
    //{
    // if(mysqli_multi_query($conn, $query))
    // {
    //  echo 'Item Data Inserted';
    // }
    // else
    // {
    //  echo 'Error';
    // }
    //}




      //mysqli_query($conn, $add_new_order) or die(mysqli_error($conn));

      //echo "success!";

   

 
   






    //foreach ($json as $key => $value) {
    //    # code...
    //    $k[] = $key;
    //    $v[] = $value;
    //    echo  '<script>console.log("branchid:' . $k . '")</script>'; 
    //}


    //echo gettype($json);

   //echo  '<script>console.log("branchid:' . $json . '")</script>'; 

    
    //$post_data = json_decode(json_encode($_POST['inventoryid']));


    //echo  $someArray;

    //$inventory_id = $_POST['inventory_id'];
    //$query = '';
//
    //    for($count = 0; $count<count($inventory_id); $count++)
    //    {
    //        $inventory_id_clean = mysqli_real_escape_string($conn, $inventory_id[$count]);  
//
    //        if($inventory_id_clean != '')
    //        {
    //         $query .= "
    //         INSERT INTO testdb(testnum) 
    //         VALUES('".$inventory_id_clean."'); 
    //         ";
    //        }
    //        else {
    //            echo 'D gumana';  
    //        } 
    //    }
    //    
    //    if($query != '')
    //    {
    //     if(mysqli_multi_query($connect, $query))
    //     {
    //      echo 'Item Data Inserted';
    //     }
    //     else
    //     {
    //      echo 'Error';
    //     }
    //    }
    //    else
    //    {
    //     echo 'All Fields are Required';
    //    }

    

   //$customerid = $_POST['customerid'];
   //$branchid = $_POST['branchid'];
   //$datecheckout = $_POST['datecheckout'];
   //$totalamount = $_POST['totalamount'];
   //$moneytendered = $_POST['moneytendered'];
   //$balance = $_POST['balance'];
    //$inventory_id = $_POST['inventory_id'];
    //$product_name = $_POST['product_name'];
    //$product_quantity = $_POST['product_quantity'];
    //$product_price = $_POST['product_price'];
    //$product_totalamount = $_POST['product_totalamount'];
    //$query = '';

    //for($count = 0; $count<count($inventory_id); $count++)
    //{
//
    // $inventory_id_clean = mysqli_real_escape_string($conn, $inventory_id[$count]);   
    ////$product_name_clean = mysqli_real_escape_string($conn, $product_name[$count]);
    ////$product_quantity_clean = mysqli_real_escape_string($conn, $product_quantity[$count]);
    ////$product_pric_cleane = mysqli_real_escape_string($conn, $product_price[$count]);
    ////$product_totalamount_clean = mysqli_real_escape_string($conn, $product_totalamount[$count]);
//
    ////echo $product_name[$count]
//
    //    $query .= 
//
    //        "INSERT INTO testdb(testnum) VALUES ("'.$inventory_id_clean.'")"
//
    //       // "INSERT INTO `tbl_order`
    //       //     (
    //       //      `branchid`,
    //       //      `customerid`,
    //       //      `inventoryid`,
    //       //      `quantity`,
    //       //      `totalamount`,
    //       //      `orderdate`)
    //       // VALUES  (
    //       //      '$branchid',
    //       //      '$customerid',
    //       //      '$inventory_id_clean',
    //       //      '$product_quantity_clean',
    //       //      '$product_totalamount_clean',
    //       //      '$datecheckout')"
//
    //    }
    //}
    //
//
    //if($query != '')
    //{
    // if(mysqli_multi_query($conn, $query))
    // {
    //  echo 'Item Data Inserted';
    // }
    // else
    // {
    //  echo 'Error';
    // }
    //}
    //else
    //{
    // echo 'All Fields are Required';
    //}

   //for($i = 0; $i < count($list); $i++){

   //    $bid = $branchid 
   //    $productname = $list[$i]['productname']
   //    $quantity = $list[$i]['quantity']
   //    $productprice = $list[$i]['productprice']
   //    $totalamount = $list[$i]['totalamount']

   //    $add_new_order= (

   //        "INSERT INTO `tbl_order`
   //            (
   //             `branchid`,
   //             `customerid`,
   //             `inventoryid`,
   //             `quantity`,
   //             `totalamount`)
   //            VALUES      
   //            (
   //             '$bid',
   //             '1',
   //             '1',
   //             '$productname',
   //             '$quantity',
   //             '$totalamount',
   //             )"
   //    );

   //    query($add_new_order,$conn)
   //}


    
    //$TableData = array();
    //
    //$TableData = $_POST['TableData'];
//
    //foreach ($TableData as $key => $value) {
    //    # code...
    //    $k[] = $key;
    //    $v[] = $value;
    //}
//
    //echo $v;


    //include '../database/dbsql.php';
    //
    //$branchid = $_POST['branchid'];
    //$customercheckout = $_POST['customercheckout'];
    //$checkoutdate = $_POST['checkoutdate']; 
    //$productcheckout = $_POST['productcheckout'];
    //$quantitycheckout = $_POST['quantitycheckout'];
    //$totalamountcheckout = $_POST['totalamountcheckout'];
//
	//$add_new_order= (
//
    //    "INSERT INTO `tbl_order`(
    //         `branchid`,
    //         `customerid`,
    //         `inventoryid`,
    //         `quantity`,
    //         `totalamount`,
    //         `orderdate`)
    //      VALUES (
    //         '$branchid',
    //         '$customercheckout',
    //         '$productcheckout',
    //         '$quantitycheckout',
    //         '$totalamountcheckout',
    //         '$checkoutdate'
    //         )"
//
    //);
    //
    //query($add_new_order,$conn)
?>


 