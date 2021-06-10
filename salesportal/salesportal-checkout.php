<?php
include "header.php";
$inventory_data = ("SELECT SUM(tbl_inventory.quantity) as sumofquantity, 
tbl_product.productname, tbl_product.productprice, tbl_product.productcode, 
tbl_inventory.inventoryid,tbl_inventory.quantity, tbl_supplier.suppliername  FROM `tbl_inventory`
JOIN `tbl_product` ON tbl_product.productid=tbl_inventory.productid 
JOIN `tbl_receiving` ON tbl_receiving.receivingid=tbl_inventory.receivingid
JOIN `tbl_supplier` ON tbl_supplier.supplierid=tbl_receiving.supplierid
WHERE tbl_inventory.branchid = $branchid && tbl_inventory.quantity != 0 GROUP BY tbl_product.productcode ORDER BY RAND()");
$data = mysqli_query($conn, $inventory_data);


$customer_query = ("SELECT *  FROM `tbl_customer`
JOIN `tbl_branch` ON tbl_branch.branchid=tbl_customer.branchid 
WHERE tbl_branch.branchid = $branchid 
");
$customer_data = mysqli_query($conn, $customer_query);


$order_query = ("SELECT tbl_product.productcode, tbl_product.productname, tbl_order.quantity, tbl_order.totalamount, tbl_order.orderdate  FROM `tbl_order`
JOIN `tbl_customer` ON tbl_customer.customerid=tbl_order.customerid
JOIN `tbl_branch` ON tbl_branch.branchid=tbl_order.branchid
JOIN `tbl_inventory` ON tbl_inventory.inventoryid=tbl_order.inventoryid 
JOIN `tbl_product` ON tbl_product.productid=tbl_product.productid
WHERE tbl_order.branchid = $branchid  GROUP BY tbl_order.totalamount");
$order_data = mysqli_query($conn, $order_query);
?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- CHECKOUT-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>
    
    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <form class="checkout">
                <div class="row">
                    <div class="columns">
                        <div class="column" style="margin-left:10px;">
                            <span class="icon">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </span>
                            <span class="portal-font  has-text-left">Check Out</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="columns">
                        <div class="column" style="margin:10px;">
                        <ul class="steps is-small">
                          <li class="step-item is-completed">
                            <div class="step-marker">
                              <span class="icon">
                                <i class="fa fa-check"></i>
                              </span>
                            </div>
                            <div class="step-details">
                              <p class="step-title">Customer Details</p>
                            </div>
                          </li>
                          <li class="step-item is-active">
                            <div class="step-marker">2</div>
                            <div class="step-details">
                              <p class="step-title">Check out</p>
                            </div>
                          </li>
                          <li class="step-item">
                            <div class="step-marker">3</div>
                            <div class="step-details">
                              <p class="step-title">Transaction</p>
                            </div>
                          </li>
                        </ul>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="row">
                        <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                        <div class="columns" style="margin:50px;">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Choose Customer</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="customerid" id="customerid" required>
                                                <option value="" disabled selected>Choose Customer</option>
                                                <?php while ($row = mysqli_fetch_assoc($customer_data)) { ?>
                                                <option value="<?php echo $row["customerid"] ?>"> <p  style="text-transform: capitalize;" > (<?php echo $row["customername"]; ?>) <?php echo $row["dateadded"]; ?> <p> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="submit-button field is-grouped is-grouped-right">
                                    <input class="button is-light" id="submit" name="submit" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>

<?php include "footer.php" ?>

<!-- header.php / nanjan ung header natin-->

<script>
    
    $(document).ready(function() {

        $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
        });

        console.log($('form').serialize())
        $('form').on('submit', function(event) {

            var customerid = $("#customerid").val()
            
            event.preventDefault();
            console.log($('form').serialize())
            top.location.href = "salesportal-checkout-orders.php?csid="+ customerid;
            return false;
            //top.location.href = "salesportal-category-orders.php?csid="+ customerid ;
        });


        
    });
</script>