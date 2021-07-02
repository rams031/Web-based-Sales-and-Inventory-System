<?php include "header.php" ;
$customerid = $_GET['customerid'];
$customer_query = ("SELECT * FROM `tbl_customer` WHERE customerid = $customerid");
$customer_data = mysqli_query($conn, $customer_query);
?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- BRANCH STOCK-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10">
        <div class="crumblerows">
            <div class="crumblerow">
                <div class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li>
                            <a href="salesportal-customer.php">
                                <span class="icon is-small">
                                    <i class="fas fa-file-alt" aria-hidden="true"></i>
                                </span>
                                <span>Manage Customer</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </span>
                                <span>Edit Customer</span>
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
                        <span class="portal-font  has-text-left">Edit Customer</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <?php while ($row = mysqli_fetch_assoc($customer_data)) { ?>
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <input type="hidden" id="customerid" name="customerid" value="<?php echo $customerid ?>">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Customer Name</label>
                                <div class="control">
                                    <input name="customername" id="customername" class="input" type="text" value="<?php echo $row['customername'] ?>" placeholder="Category Name" required>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Customer Address <small>(Optional)</small></label>
                                <div class="control">
                                    <textarea name="customerlocation" id="customerlocation" class="textarea"  placeholder="Category Description"><?php echo $row['customeraddress'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Customer Contact <small>(Optional)</small></label>
                                <div class="control">
                                    <input name="customercontact" id="customercontact" class="input" type="number" maxlength="10" value="<?php echo $row['customercontact'] ?>" placeholder="Customer Contact">
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Date</label>
                                <div class="control">
                                    <input name="customerdate" id="customerdate" value="<?php echo $row['customerdate'] ?>" class="input" type="date"  placeholder="Category Name" required>
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
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

 
<script>
$(document).ready(function() {

    $('#customercontact').on("input", function () {     
        if (this.value.length > 11)         
            this.value = this.value.slice(0,11); 
    });

    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $('form').on('submit', function(event) {

        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../../phpaction/editcustomer.php',
            data: $('form').serialize(),
            success: function(data) {
                swal("Customer Data Saved", "Succesfully", "success", {
                    buttons: false,
                    timer: 4000,
                    closeOnClickOutside: false
                }), setTimeout(function() {
                    top.location.href = "salesportal-customer.php"
                }, 2000);
            },
            error: function(data) {
                swal("Database Error", "Make sure the input is correct", "error")
            }
        });

    });
});
</script>