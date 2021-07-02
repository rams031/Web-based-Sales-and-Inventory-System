<?php include "header.php";

$branchdataid = $_GET['branchdataid'];
$branch_query = ("SELECT * FROM `tbl_branch` WHERE `branchid` = $branchid");
$branch_data = mysqli_query($conn, $branch_query); 

while ($row = mysqli_fetch_assoc($branch_data)) { 
    
    $branchname = $row["branchname"];
    $branchtinnumber = $row["branchtinnumber"]; 
    $branchlocation = $row["branchlocation"];
    $branchaddress = $row["branchaddress"];
    $branchemail = $row["branchemail"]; 
    $branchcontact = $row["branchcontact"];
    $branchdescription = $row["branchdescription"]; 
    $branchregistrationnumber = $row["branchregistrationnumber"];
    $branchtype = $row["branchtype"]; 
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
                            <a href="adminportal-branch.php">
                                <span class="icon is-small">
                                    <i class="fas fa-archive " aria-hidden="true"></i>
                                </span>
                                <span>Manage Branch</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </span>
                                <span>Edit Branch</span>
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
                            <i class="fas fa-edit fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Edit Branch</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                        <input name="branchid" id="branchid" value="<?php echo $_GET['branchid']; ?>" type="hidden" >
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Name</label>
                                    <div class="control">
                                        <input name="branchname" id="branchname" class="input" type="text" value="<?php echo $branchname ?>"placeholder="Branch Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">TIN <small>(Optional)<small></label>
                                    <div class="control">
                                        <input name="tinno" id="tinno"  class="input" type="text" value="<?php echo $branchtinnumber ?>" placeholder="Tin(Number)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-3">
                                <div class="field">
                                    <label class="label">Branch City</label>
                                    <div class="control">
                                        <input name="branchcity" id="branchcity"   class="input" type="text" value="<?php echo $branchlocation ?>" placeholder="Branch City" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Address</label>
                                    <div class="control">
                                        <input name="branchaddress" id="branchaddress"   class="input" type="text" value="<?php echo $branchaddress ?>" placeholder="Branch Address" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column ">
                                <div class="field">
                                    <label class="label">Branch Email <small>(Optional)<small></label>
                                    <div class="control">
                                        <input name="branchemail" id="branchemail"   class="input" type="email" value="<?php echo $branchemail ?>" placeholder="Branch Email">
                                    </div>
                                </div>
                            </div>

                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Contact</label>
                                    <div class="control">
                                        <input name="branchcontact" id="branchcontact"   type="tel"  minlength="11" class="input" value="<?php echo $branchcontact ?>" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Description</label>
                                    <div class="control">
                                        <textarea name="branchdescription" id="branchdescription" class=" form-control textarea" placeholder="Branch Description" required><?php echo $branchdescription ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Company Registration No. <small>(Optional)<small></label>
                                    <div class="control">
                                        <input name="companyregno" id="companyregno"  class="input" type="number" value="<?php echo $branchregistrationnumber ?>" placeholder="Branch Registration Number">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Type</label>
                                    <div class="control">
                                        <input name="branchtype" id="branchtype" class="input" type="text"  value="<?php echo $branchtype ?>" readonly>
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

<script>
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $('#branchtype').prop("disabled",true);
    $('form').on('submit', function(event) {

        event.preventDefault();
        $('#branchtype').prop("disabled",false);

        $.ajax({
            type: 'POST',
            url: '../../phpaction/editbranch.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data = "saved") {
                    swal("Branch Data Edited", "Succesfully", "success", {
                        buttons: false,
                        closeOnEsc: false,
                        closeOnClickOutside: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "adminportal-branch.php"
                    }, 2000);
                } else {
                    swal("Database Error", "Make sure the input is correct", "error")
                }
            },
        });

    });
</script>