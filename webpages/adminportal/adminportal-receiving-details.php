<?php include "header.php";
$receivingid = $_GET['receivingid'];
$receiving_query = ("SELECT * FROM `tbl_receiving` 
JOIN `tbl_supplier` ON tbl_receiving.supplierid=tbl_supplier.supplierid
JOIN `tbl_inventory` ON tbl_receiving.receivingid=tbl_inventory.receivingid
JOIN `tbl_stock` ON tbl_inventory.stockid=tbl_stock.stockid
JOIN `tbl_product` ON tbl_stock.productid=tbl_product.productid
WHERE tbl_receiving.receivingid = $receivingid");
$receiving_data = mysqli_query($conn, $receiving_query);

$receiving_info_query = ("SELECT * FROM `tbl_receiving` WHERE receivingid = $receivingid");
$receiving_data_info = mysqli_query($conn, $receiving_info_query);

$receiving_data_summary = ("SELECT SUM(tbl_inventory.quantity) as quantitysum,COUNT(tbl_product.productid) as productsum FROM `tbl_receiving` 
JOIN `tbl_inventory` ON tbl_receiving.receivingid=tbl_inventory.receivingid
JOIN `tbl_stock` ON tbl_inventory.stockid=tbl_stock.stockid
JOIN `tbl_product` ON tbl_stock.productid=tbl_product.productid
WHERE tbl_receiving.receivingid = $receivingid;");
$receiving_summary = mysqli_query($conn, $receiving_data_summary); 

?>

<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- BRANCH STOCK-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10 ">
        <div class="crumblerows animate__animated animate__fadeInDown">
            <div class="crumblerow">
                <div class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li>
                            <a href="adminportal-receiving.php">
                                <span class="icon is-small">
                                    <i class="fas fa-archive " aria-hidden="true"></i>
                                </span>
                                <span>Manage Receiving</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-list" aria-hidden="true"></i>
                                </span>
                                <span>Receiving</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row">
                <div class="columns">
                    <div class="column">
                        <span class="icon">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <?php while ($rowfield = mysqli_fetch_assoc($receiving_data_info)) { ?>
                        <span class="portal-font">Receiving Data </span><span style="margin-right:20px;">(Ref No: <?php echo $rowfield["referenceno"]; ?>)</span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <table class="display" cellspacing="0" width="100%" style="text-align:center;">
                        <thead>
                            <tr>
                                <th>Inventory ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Supplier</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($receiving_data)) { ?>
                                <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                <tr>
                                    <td><?php echo $row["inventoryid"]; ?></td>
                                    <td>#<?php echo $row["productname"]; ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["suppliername"]; ?></td>
                                    <td><?php echo $row["dateadded"]; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr> 
            <div class="row">
                <div class="columns">
                    <?php while ($row = mysqli_fetch_assoc($receiving_summary)) { ?>
                    <div class="column tabletransaction">
                        <h1 class="portal-font">Total Quantity: <?php echo $row["quantitysum"]; ?></h1>
                    </div>
                    <div class="column tabletransaction">
                        <h1 class="portal-font">Total Product: <?php echo $row["productsum"]; ?></h1>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
$(document).ready(function() {
    $('.display').DataTable({ responsive: true, searching: false, info: false });
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $('form').on('submit', function(event) {

        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../../phpaction/editreceiving.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
                    swal("Receiving Data Saved", "Succesfully", "success", {
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "adminportal-receiving.php"
                    }, 2000);
                } else {
                    swal("Database Error", "Make sure the input is correct", "error")
                }
            },
        });

    });
});
</script>