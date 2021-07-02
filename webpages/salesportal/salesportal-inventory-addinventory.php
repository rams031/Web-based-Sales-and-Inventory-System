<?php include "header.php";
$stock_query = ("SELECT * FROM `tbl_stock` 
JOIN `tbl_product` ON tbl_stock.productid=tbl_product.productid
WHERE tbl_stock.branchid = $branchid");
$stock_data = mysqli_query($conn, $stock_query); 

$receiving_query = ("SELECT * FROM `tbl_receiving` 
JOIN `tbl_supplier` ON tbl_supplier.supplierid=tbl_receiving.supplierid 
WHERE tbl_receiving.branchid = $branchid");
$receiving_data = mysqli_query($conn, $receiving_query); 
?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- BRANCH STOCK-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10 ">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row">
                <div class="columns">
                    <div class="column" style="margin-left:10px;">
                        <span class="icon">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Add New Inventory</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Stock</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="stockid" id="stockid" required>
                                            <option value="" disabled selected>Choose Stock</option>
                                            <?php while ($row = mysqli_fetch_assoc($stock_data)) { ?>
                                            <option value="<?php echo $row["stockid"] ?>" style="text-transform:capitalize"> Product Code: #<?php echo $row["productcode"] ?> - Product : <?php echo $row["productname"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Receiving Log</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="receivingcategory" id="receivingcategory" required>
                                            <option value="" disabled selected>Choose Receiving</option>
                                            <?php while ($row = mysqli_fetch_assoc($receiving_data)) { ?>
                                            <option value="<?php echo $row["receivingid"] ?>"> Supplier: <?php echo $row["suppliername"]; ?> - Reference Number: #<?php echo $row["referenceno"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">  
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Quantity</label>
                                <div class="control">
                                    <input name="quantity" id="quantity" class="input" type="number" min="1" placeholder="Product Quantity" required>
                                </div>
                                
                            </div>
                        </div>                              
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Date Added</label>
                                <div class="control">
                                    <input name="dateadded" id="dateadded" class="input" type="date" placeholder="Supplier Contact" required>
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
                </form>
            </div>
        </div>
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

    $('form').on('submit', function(event) {

        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../../phpaction/addnewinventory.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "successsuccess") {
                    swal("Inventory Data Saved", "Succesfully", "success", {
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "salesportal-inventory.php"
                    }, 2000);
                } else {
                    swal("Database Error", "Make sure the input is correct", "error")
                }
            },
        });

    });
});
</script>