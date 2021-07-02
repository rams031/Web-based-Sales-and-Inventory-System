<?php

    include '../database/dbsql.php';

    $stockid = $_POST['stockid'];
    $inventoryid = $_POST['inventoryid'];
    $branchid = $_POST['branchid'];
    $productcategory = $_POST['productcategory'];
    $receivingcategory = $_POST['receivingcategory'];
    $dateadded = $_POST['dateadded'];
    $subtractquantity = $_POST['subtractquantity'];
    $addquantity = $_POST['addquantity'];
    
    $update_inventory_date= (

         "UPDATE `tbl_inventory`
         SET    
                `dateadded` = '$dateadded'
         WHERE  inventoryid = $inventoryid"

    );

    mysqli_query($conn, $update_inventory_date) or die(mysqli_error($conn));
    if ($update_inventory_date) {
      echo "success";
    }
    else {
      echo ("ERROR :" . $update_inventory_date . "<br>" . mysqli_error($conn));
    }

    

    if ($addquantity != ""){

        $update_stock= (

            "UPDATE `tbl_stock`
            SET    
                `stockquantity` = stockquantity + $addquantity 
            WHERE  stockid = $stockid"

        );
    
        $update_inventory= (

            "UPDATE `tbl_inventory`
            SET    
                `quantity` = quantity + $addquantity 
            WHERE  inventoryid = $inventoryid"

        );

        mysqli_query($conn, $update_inventory) or die(mysqli_error($conn));
        if ($update_inventory) {
            
            mysqli_query($conn, $update_stock) or die(mysqli_error($conn));
            if ($update_stock) {
              echo "success";
            }
            else {
              echo ("ERROR :" . $update_stock . "<br>" . mysqli_error($conn));
            }
        }
        else {
          echo ("ERROR :" . $update_inventory . "<br>" . mysqli_error($conn));
        }

    }

    if ($subtractquantity != ""){
    
        $update_inventory= (

            "UPDATE `tbl_inventory`
            SET    
                `quantity` = quantity - $subtractquantity 
            WHERE  inventoryid = $inventoryid"

        );

        $update_stock= (

            "UPDATE `tbl_stock`
            SET    
                   `stockquantity` =  stockquantity - $subtractquantity 
            WHERE  stockid = $stockid"

        );

        mysqli_query($conn, $update_stock) or die(mysqli_error($conn));
        if ($update_stock) {
            mysqli_query($conn, $update_inventory) or die(mysqli_error($conn));
            if ($update_inventory) {
              echo "success";
            }
            else {
              echo ("ERROR :" . $update_inventory . "<br>" . mysqli_error($conn));
            }
        }
        else {
          echo ("ERROR :" . $update_stock . "<br>" . mysqli_error($conn));
        }

    }
?>