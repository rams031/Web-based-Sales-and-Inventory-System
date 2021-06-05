<?php include "header.php" ?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- BRANCH STOCK-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row">
                <div class="columns">
                    <div class="column" style="margin-left:10px;">
                        <span class="icon">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Add New Customer</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Customer Name</label>
                                <div class="control">
                                    <input name="customername" id="customername" class="input" type="text" placeholder="Category Name" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Customer Address <small>(Optional)</small></label>
                                <div class="control">
                                    <textarea name="customerlocation" id="customerlocation" class="textarea" placeholder="Category Description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Customer Contact <small>(Optional)</small></label>
                                <div class="control">
                                    <input name="customercontact" id="customercontact" class="input" type="number" maxlength="10" placeholder="Customer Contact">
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Date</label>
                                <div class="control">
                                    <input name="customerdate" id="customerdate" class="input" type="date"  placeholder="Category Name" required>
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

    console.log($('form').serialize())
    $('form').on('submit', function(event) {

        event.preventDefault();
        console.log($('form').serialize())

        $.ajax({
            type: 'POST',
            url: '../../phpaction/addnewcustomer.php',
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
                console.log(data)
            }
        });

    });
});
</script>