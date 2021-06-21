<?php
include "header.php";
$transactionid = $_GET['transactionid'];

$order_query= ("SELECT * FROM `tbl_order` 
JOIN `tbl_inventory` ON tbl_order.inventoryid=tbl_inventory.inventoryid  
JOIN `tbl_product` ON tbl_inventory.productid=tbl_product.productid  
where tbl_order.transactionid = $transactionid && tbl_order.branchid = $branchid");
$order_data = mysqli_query($conn, $order_query); 


$transaction_query= ("SELECT * FROM `tbl_transaction` 
JOIN `tbl_customer` ON tbl_transaction.customerid=tbl_customer.customerid  
WHERE tbl_transaction.transactionid = $transactionid LIMIT 1");
$transaction_data = mysqli_query($conn, $transaction_query); 
while ($row = mysqli_fetch_assoc($transaction_data)) { 
    $customername = $row["customername"];
    $date = $row["date"];
    $orderamount = $row["orderamount"];
    $moneytendered = $row["moneytendered"];
    $balance = $row["balance"];
} 


?>

<div class="columns">
    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
    </div>
    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row is-full">
                <div class="columns">
                <div class="column is-12">
                    <div style="margin-bottom:50px;">
                        <span class="icon">
                            <i class="fas fa-file-invoice fa-2x"></i>
                        </span>
                        <span class="portal-font">Transaction Invoice</span></div>
                    <div class="column is-12" style="margin:20px;">
                        <div class="columns">
                            <div class="column is-9">
                            <p> <strong> Billed To: </strong> </p>
                            <p style="text-transform:capitalize;"><?php echo $customername ?></p>
                            <p><?php echo $date ?></p>
                            </div>

                            <div class="column">
                            <p> <strong> Method of Payment: </strong> </p>
                            <p> Cash </p>
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <p> <strong> Orders </strong> </p>
                        <table class="table tabletransaction" style="width:100%">
                        <thead>
                          <tr>
                            <th>Inventory ID</th>
                            <th>Product Name</th>
                            <th>Order Quantity</th>
                            <th>Order Price</th>
                            <th>Total Amount</th>
                          </tr>
                          <tr>
                        </thead>
                        <tbody>
                        <?php while ($rowfield = mysqli_fetch_assoc($order_data)) { ?>
                          <tr>
                              <td><?php echo $rowfield["inventoryid"]; ?></td>
                              <td><?php echo $rowfield["productname"]; ?></td>
                              <td><?php echo $rowfield["orderquantity"]; ?></td>
                              <td><?php echo $rowfield["productprice"]; ?></td>
                              <td><?php echo $rowfield["totalamount"]; ?></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                    </div>
                    <div class="column is-12" style="margin:20px;">
                        <div class="columns">
                            <div class="column is-9"></div>
                            <div class="column">
                            <p> <strong> Order Total Amount: </strong> <?php echo $orderamount ?> </p>
                            <p> <strong> Total Payment: </strong> <?php echo $moneytendered ?> </p>
                            <p> <strong> Total Change: </strong> <?php echo $balance ?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <a href="../../api/fpdf1/pdf.php?transactionid=<?php echo $transactionid ?>" class="button is-light">
                            Print PDF
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('.display').DataTable({ responsive: true });
        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });
</script>

</html>
