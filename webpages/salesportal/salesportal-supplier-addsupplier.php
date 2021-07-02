<?php include "header.php";

$branch_query = ("SELECT * FROM `tbl_branch` where branchtype = 'main'");
$branch_data = mysqli_query($conn, $branch_query); 

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
                        <span class="portal-font  has-text-left">Add New Supplier</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid']; ?>">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Supplier <small>(Main Branch)</small></label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="supplierid" id="supplierid" required>
                                            <option value="" disabled selected>Choose Supplier</option>
                                            <?php while ($row = mysqli_fetch_assoc($branch_data)) { ?>
                                            <option value="<?php echo $row["branchid"] ?>"> (Main Branch) <?php echo $row["branchname"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Since (date)</label>
                                <div class="control">
                                    <input name="supplierdate" id="supplierdate" class="input" type="date" placeholder="Supplier Contact" required>
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
        var suppliername =  '';
        var supplieraddress =  '';
        var suppliercontact =  '';
        var supplierid = $("#supplierid").val();
        var branchid = $("#branchid").val();
        var supplierdate =$("#supplierdate").val();
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../../phpaction/addnewsupplierbranch.php',
            data: {
                   suppliername:suppliername,
                   supplieraddress:supplieraddress,
                   suppliercontact:suppliercontact,
                   supplierid:supplierid,
                   branchid:branchid,
                   supplierdate:supplierdate
                  },
            success: function(data) {
                if (data === "success") {
                    swal("Supplier Data Saved", "Succesfully", "success", {
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "salesportal-supplier.php"
                    }, 2000);
                } else {
                    swal("Database Error", "Make sure the input is correct", "error")
                }
            },
        });

    });
});
</script>