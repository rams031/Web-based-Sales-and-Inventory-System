<?php include "header.php";
$inventoryid = $_GET['inventoryid'];
$inventory_getdata = ("SELECT * FROM `tbl_inventory` 
JOIN `tbl_receiving` ON tbl_inventory.receivingid=tbl_receiving.receivingid 
JOIN `tbl_supplier` ON tbl_receiving.supplierid=tbl_supplier.supplierid 
JOIN `tbl_stock` ON tbl_stock.stockid=tbl_inventory.stockid 
JOIN `tbl_product` ON tbl_stock.productid=tbl_product.productid 
where tbl_inventory.inventoryid = $inventoryid");
$data = mysqli_query($conn, $inventory_getdata); 

$receiving_query = ("SELECT * FROM `tbl_receiving` 
JOIN `tbl_supplier` ON tbl_supplier.supplierid=tbl_receiving.supplierid WHERE tbl_receiving.branchid = $branchid");
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
        <div class="crumblerows">
            <div class="crumblerow  animate__animated animate__fadeInDown">
                <div class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li>
                            <a href="adminportal-inventory.php">
                                <span class="icon is-small">
                                    <i class="fas fa-archive " aria-hidden="true"></i>
                                </span>
                                <span>Manage Inventory</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </span>
                                <span>Edit Inventory</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row">
                <div class="columns">
                    <div class="column" style="margin-left:10px;">
                        <span class="icon">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Edit Inventory</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <form >
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <input type="hidden" id="inventoryid" name="inventoryid" value="<?php echo $inventoryid ?>">
                    <input type="hidden" id="stockid" name="stockid" value="<?php echo $row['stockid'] ?>">
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Product</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="productcategory" id="productcategory" disabled>
                                            <option value="<?php echo $row["productid"] ?>" style="text-transform:capitalize" selected> Product Code: #<?php echo $row["productcode"] ?> - Product : <?php echo $row["productname"] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Receiving</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="receivingcategory" id="receivingcategory" disabled>
                                            <option value="<?php echo $row["receivingid"] ?>" disabled selected> Supplier: <?php echo $row["suppliername"]; ?> - Reference Number: #<?php echo $row["referenceno"]; ?></option>
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
                                    <input name="quantity" id="quantity" class="input" type="number" value="<?php echo $row["quantity"] ?>" placeholder="Product Quantity" disabled>
                                </div>
                                
                            </div>
                        </div>                              
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Date Added</label>
                                <div class="control">
                                    <input name="dateadded" id="dateadded" class="input" type="date" value="<?php echo $row["dateadded"] ?>" placeholder="Supplier Contact" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">  
                        <div class="column is-6">
                            <div class="columns" style="margin: 10px;"> 
                                <div class="column is-4"> 
                                    <div class="field">
                                        <div class="control">
                                        <input type="radio" id="quantitycontrol" name="quantitycontrol" value="add" >
                                        <label for="quantity">Add Quantity</label><br>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label addquantity">Add Quantity</label>
                                        <div class="control">
                                            <input name="addquantity" id="addquantity" class="input" type="number" placeholder="Add Quantity" >
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-4"> 
                                    <div class="field">
                                        <div class="control">
                                        <input type="radio" id="quantitycontrol" name="quantitycontrol" value="subtract" >
                                        <label for="quantity">Subtract Quantity</label><br>
                                         </div>
                                    </div>
                                    <div class="field">
                                        <label class="label subtractquantity">Subtract Quantity</label>
                                        <div class="control">
                                            <input name="subtractquantity" id="subtractquantity" class="input" type="number" placeholder="Subtract Quantity" >
                                        </div>
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
                </form>
                <?php } ?>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
$(document).ready(function() {
 
    $("#subtractquantity , .subtractquantity ").hide();
    $("#addquantity , .addquantity ").hide();
    
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $('input[type=radio][name=quantitycontrol]').change(function() {
    if (this.value == 'add') {
        $('#addquantity').prop("required",true);
        $('#subtractquantity').prop("required",false);
        $("#addquantity , .addquantity ").show();
        $("#subtractquantity , .subtractquantity ").hide();
    }
    else if (this.value == 'subtract') {
        $('#subtractquantity').prop("required",true);
        $('#addquantity').prop("required",false);
        $("#subtractquantity , .subtractquantity ").show();
        $("#addquantity , .addquantity ").hide();
    }
    });

    $('form').on('submit', function(event) {

        var stockid = $("#stockid").val();
        var branchid = $("#branchid").val();
        var inventoryid = $("#inventoryid").val();
        var productcategory = $("#productcategory").val();
        var receivingcategory = $("#receivingcategory").val();
        var dateadded = $("#dateadded").val();
        var subtractquantity = $("#subtractquantity").val();
        var addquantity = $("#addquantity").val();

        event.preventDefault();


        $.ajax({
            type: 'POST',
            url: '../../phpaction/editinventory.php',
            data: {
                stockid:stockid,
                inventoryid:inventoryid,
                branchid:branchid,
                productcategory:productcategory,
                receivingcategory:receivingcategory,
                dateadded:dateadded,
                subtractquantity:subtractquantity,
                addquantity:addquantity
            },
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