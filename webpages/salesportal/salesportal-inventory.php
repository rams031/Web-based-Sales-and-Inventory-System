<?php
include "header.php";
$inventory_data = ("SELECT SUM(tbl_inventory.quantity) as sumofquantity, 
tbl_product.productname, tbl_product.productprice, 
tbl_inventory.inventoryid,tbl_inventory.quantity, tbl_supplier.suppliername  FROM `tbl_inventory`
JOIN `tbl_product` ON tbl_product.productid=tbl_inventory.productid 
JOIN `tbl_receiving` ON tbl_receiving.receivingid=tbl_inventory.receivingid
JOIN `tbl_supplier` ON tbl_supplier.supplierid=tbl_receiving.supplierid
WHERE tbl_inventory.branchid = $branchid GROUP BY tbl_product.productcode
");
$data = mysqli_query($conn, $inventory_data);
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
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Supplier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                    <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["inventoryid"]; ?></td>
                                        <td><?php echo $row["productname"]; ?></td>
                                        <td>P<?php echo $row["productprice"]; ?></td>
                                        <td><?php echo $row["sumofquantity"]; ?></td>
                                        <td><?php echo $row["suppliername"]; ?></td>
                                        <td>
                                            <a href='adminportal-branch-editbranch.php?branchid=<?php echo $row["branchid"]; ?>' class="button is-light is-small">
                                                Edit Branch
                                            </a>
                                            <a onclick=DeleteBranch(<?php echo $row["branchid"]; ?>) class="button is-light is-small">
                                                construction
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

$(document).ready(function() {
    $('.display').DataTable({ responsive: true });
    
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});
</script>

</html>