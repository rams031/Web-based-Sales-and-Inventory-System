<?php include "header.php";
$receivingid = $_GET['receivingid'];
$receiving_query = ("SELECT * FROM `tbl_receiving` 
JOIN `tbl_supplier` ON tbl_receiving.supplierid=tbl_supplier.supplierid
JOIN `tbl_branch` ON tbl_supplier.branchsupplierid=tbl_branch.branchid
WHERE receivingid= $receivingid");
$receiving_data = mysqli_query($conn, $receiving_query);

while ($row = mysqli_fetch_assoc($receiving_data)) {
    $referenceno = $row["referenceno"];
    $date = $row["date"];
    $supplierid = $row["supplierid"];
    $branchid = $row["branchid"];
    $branchname = $row["branchname"];

}

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
                            <a href="salesportal-receiving.php">
                                <span class="icon is-small">
                                    <i class="fas fa-archive " aria-hidden="true"></i>
                                </span>
                                <span>Manage Receiving</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </span>
                                <span>Edit Receiving</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
                    <input type="hidden" id="receivingid" name="receivingid" value="<?php echo $receivingid ?>">
                    <div class="columns">
                        <div class="column is-12">
                            <div class="field">
                                <label class="label">Reference Number</label>
                                <div class="control">
                                    <input name="referencenumber" id="referrencenumber" class="input" type="number" min="0" value="<?php echo $referenceno ?>" placeholder="Referrence Number" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-10">
                            <div class="field">
                                <label class="label">Date</label>
                                <div class="control">
                                    <input name="date" id="date" class="input" type="date" value="<?php echo $date ?>" placeholder="Date" required>
                                </div>
                            </div>
                        </div>
                         
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Supplier</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="supplierid" id="supplierid" disabled>
                                            <option value="<?php echo $supplierid ?>" selected><?php echo $branchname ?></option>
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

    $('form').on('submit', function(event) {

        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../../phpaction/editreceivingbranch.php',
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
                }
            },
        });

    });
});
</script>