<?php
include "header.php";
$transaction_query = ("SELECT * FROM `tbl_transaction` 
JOIN `tbl_customer` ON tbl_transaction.customerid=tbl_customer.customerid where tbl_transaction.branchid = $branchid  ORDER BY tbl_transaction.date DESC");
$transaction_data = mysqli_query($conn, $transaction_query);
?>

<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
    </div>

    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">

            <div class="row is-full">
                <div class="columns">
                <div class="column">                        
                    <div style="margin-bottom:50px;">
                        <span class="icon">
                            <i class="fas fa-store fa-2x"></i>
                        </span>
                        <span class="portal-font">Transaction</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Customer Name</th>
                                    <th>Order Amount</th>
                                    <th>Money Tendered</th>
                                    <th>Change</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($transaction_data)) { ?>
                                    <input class="responsive" width="100%" id="transactionid" name="transactionid" type="hidden" value="<?php echo $row["transactionid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["transactionid"]; ?></td>
                                        <td><?php echo $row["customername"]; ?></td>
                                        <td><?php echo $row["orderamount"]; ?></td>
                                        <td><?php echo $row["moneytendered"]; ?></td>
                                        <td><?php echo $row["balance"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <td>
                                            <a href='salesportal-transaction-invoice.php?transactionid=<?php echo $row["transactionid"]; ?>' class="button is-light is-small">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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