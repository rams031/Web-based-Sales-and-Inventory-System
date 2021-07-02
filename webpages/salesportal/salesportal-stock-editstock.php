<?php include "header.php";
$stockid = $_GET['stockid'];
$stock_getdata = ("SELECT * FROM `tbl_stock` 
JOIN `tbl_product` ON tbl_product.productid=tbl_stock.productid 
WHERE tbl_stock.stockid='$stockid' limit 1");
$data = mysqli_query($conn, $stock_getdata);
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
                            <a href="salesportal-stock.php">
                                <span class="icon is-small">
                                    <i class="fas fa-archive " aria-hidden="true"></i>
                                </span>
                                <span>Manage Stock</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </span>
                                <span>Edit Stock</span>
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
                        <span class="portal-font  has-text-left">Edit Stock</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <input type="hidden" id="stockid" name="stockid" value="<?php echo $stockid ?>">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Product</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="productid" id="productid" disabled>
                                            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                            <option value="<?php echo $row["productid"] ?>" style="text-transform:capitalize" disabled selected>Product Code: #<?php echo $row["productcode"] ?> - Product : <?php echo $row["productname"] ?></option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Date Added</label>
                                <div class="control">
                                    <input name="stockdate" id="stockdate" class="input" type="date" value="<?php echo $row["stockdate"] ?>"  placeholder="Date" >
                                    <?php } ?>
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

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
    $(document).ready(function() {
        $(".Dropdown-usertype").hide();

        $("#usertype").change(function() {
            if ($("#usertype").val() == "sales") {
                $(".Dropdown-usertype").show(500);
                $("#userbranch").attr('required', 'required')
            } else {
                $(".Dropdown-usertype").hide(500);
                $("#userbranch").removeAttr('required');
            }
        });

        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });

        $('form').on('submit', function(event) {

            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: '../../phpaction/editstock.php',
                data: $('form').serialize(),
                success: function(data) {
                    if (data === "success") {
                        swal("Stock Data Saved", "Succesfully", "success", {
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            timer: 4000,
                            closeOnClickOutside: false
                        }), setTimeout(function() {
                            top.location.href = "adminportal-stock.php"
                        }, 2000);
                    } else {
                        swal("Database Error", "Make sure the input is correct", "error")
                    }
                },
            });

        });

    });
</script>

</html>