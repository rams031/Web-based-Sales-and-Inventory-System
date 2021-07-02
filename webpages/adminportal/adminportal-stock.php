<?php
include "header.php";
$inventory_data = ("SELECT * FROM `tbl_stock` 
JOIN `tbl_product` ON tbl_product.productid=tbl_stock.productid 
WHERE tbl_stock.branchid = $branchid ");
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
                            <i class="fas fa-box-open fa-2x"></i>
                        </span>
                        <span class="portal-font">Manage Stock</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Stock ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity in Stock</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                    <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["stockid"]; ?></td>
                                        <td><?php echo $row["productname"]; ?></td>
                                        <td><?php echo $row["stockquantity"]; ?></td>
                                        <td><?php echo $row["stockdate"]; ?></td>
                                        <td>
                                            <a href='adminportal-stock-editstock.php?stockid=<?php echo $row["stockid"]; ?>' class="button is-light is-small">
                                                Edit Stock
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