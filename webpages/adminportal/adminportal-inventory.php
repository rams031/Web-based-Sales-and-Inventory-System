<?php
include "header.php";
$inventory_query = ("SELECT * FROM `tbl_inventory` 
JOIN `tbl_stock` ON tbl_stock.stockid=tbl_inventory.stockid 
JOIN `tbl_product` ON tbl_stock.productid=tbl_product.productid 
JOIN `tbl_receiving` ON tbl_inventory.receivingid=tbl_receiving.receivingid 
JOIN `tbl_supplier` ON tbl_receiving.supplierid=tbl_supplier.supplierid 
WHERE tbl_inventory.branchid = $branchid ORDER BY tbl_inventory.inventoryid ASC ");
$inventory_data = mysqli_query($conn, $inventory_query);
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
                            <i class="fas fa-warehouse fa-2x"></i>
                        </span>
                        <span class="portal-font">Manage Inventory</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Inventory ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Date Added</th>
                                    <th>Supplier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($inventory_data)) { ?>
                                    <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["inventoryid"]; ?></td>
                                        <td><?php echo $row["productname"]; ?></td>
                                        <td><?php echo $row["quantity"]; ?></td>
                                        <td><?php echo $row["dateadded"]; ?></td>
                                        <td><?php echo $row["suppliername"]; ?></td>

                                        <td>
                                            <a href='adminportal-inventory-editinventory.php?inventoryid=<?php echo $row["inventoryid"]; ?>' class="button is-light is-small">
                                                Edit 
                                            </a>
                                            <a onclick=deleteinventory(<?php echo $row["inventoryid"]; ?>,<?php echo $row["quantity"]; ?>,<?php echo $row["stockid"];?>) class="button is-light is-small">
                                                <i class="fas fa-trash-alt"></i>
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

function deleteinventory(iid,qty,stckid) {

    swal("You won't be able to revert this!", {
        title: 'Are you sure?',
        dangerMode: true,
        cancel: true,
        buttons: true,
        closeOnEsc: false,
        closeOnClickOutside: false,
    }).then((result) => {
        if (result == true) {
            $.ajax({
                url: '../../phpaction/deleteinventory.php',
                method: 'POST',
                data: {
                    inventoryid: iid,
                    quantity: qty,
                    stockid: stckid
                },
                success: function(data) {
                    if (data === "successsuccess") {
                        swal("Inventory Data Deleted", "Succesfully", "success", {
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            timer: 4000,
                            closeOnClickOutside: false
                        }), setTimeout(function() {
                            top.location.href = "adminportal-inventory.php"
                        }, 2000);
                    } else {
                        swal("Database Error", "Make sure the input is correct", "error")
                    }
                },
            })

        }
    });
}

$(document).ready(function() {
    $('.display').DataTable({ responsive: true });
    
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});
</script>

</html>