<?php include "header.php";
$supplier_query = ("SELECT * FROM `tbl_supplier` where branchid = $branchid");
$supplier_data = mysqli_query($conn, $supplier_query); ?>
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
                    <div class="column">
                        <span class="icon">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Add New Receiving</span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="columns">
                    <div class="column is-12">
                      <div class="content">
                        <br>
                        <blockquote>
                        Supplier Delivery Log
                        </blockquote>
                      </div>                        
                    </div>
                </div>

                <form>
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <div class="columns">
                        <div class="column is-12">
                            <div class="field">
                                <label class="label">Reference Number</label>
                                <div class="control">
                                    <input name="referencenumber" id="referrencenumber" class="input" type="number" placeholder="Referrence Number" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-10">
                            <div class="field">
                                <label class="label">Date</label>
                                <div class="control">
                                    <input name="date" id="date" class="input" type="date" placeholder="Supplier Contact" required>
                                </div>
                            </div>
                        </div>
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Supplier</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="supplierid" id="supplierid" required>
                                            <option value="" disabled selected>Choose Supplier</option>
                                            <?php while ($row = mysqli_fetch_assoc($supplier_data)) { ?>
                                            <option value="<?php echo $row["supplierid"] ?>"><?php echo $row["suppliername"]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="columns">
                        <div class="column">
                            <div class="submit-button field is-grouped is-grouped-right">
                                <input class="button is-light" id="Submit" name="submit" type="submit">
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
            url: '../../phpaction/addnewreceiving.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
                    swal("Receiving Data Saved", "Succesfully", "success", {
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "salesportal-receiving.php"
                    }, 2000);
                } else {
                    swal("Database Error", "Make sure the input is correct", "error")
                    console.log(data)
                }
            },
        });

    });
});
</script>