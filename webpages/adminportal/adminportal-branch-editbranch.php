<?php include "header.php";
$branchid = $_GET['branchid'];
$branch_data = ("SELECT * FROM `tbl_branch` WHERE `branchid` = $branchid limit 1");
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
            <div class="crumblerow">
                <div class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li>
                            <a href="adminportal-branch.php">
                                <span class="icon is-small">
                                    <i class="fas fa-store " aria-hidden="true"></i>
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
                    <?php
                    $result = mysqli_query($conn, $branch_data) or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_assoc($result)) { 
                    ?>
                        <input name="branchid" id="branchid" value="<?php echo $_GET['branchid']; ?>" type="hidden" >
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Name</label>
                                    <div class="control">
                                        <input name="branchname" id="branchname" value="<?php echo $row["branchname"]; ?>" class="input" type="text" placeholder="Branch Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">TIN <small>(Optional)<small></label>
                                    <div class="control">
                                        <input name="tinno" id="tinno" value="<?php echo $row["branchtinnumber"]; ?>" class="input" type="text" placeholder="Tin(Number)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-3">
                                <div class="field">
                                    <label class="label">Branch City</label>
                                    <div class="control">
                                        <input name="branchcity" id="branchcity" value="<?php echo $row["branchlocation"]; ?>" class="input" type="text" placeholder="Branch City" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Address</label>
                                    <div class="control">
                                        <input name="branchaddress" id="branchaddress" value="<?php echo $row["branchaddress"]; ?>" class="input" type="text" placeholder="Branch Address" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column ">
                                <div class="field">
                                    <label class="label">Branch Email <small>(Optional)<small></label>
                                    <div class="control">
                                        <input name="branchemail" id="branchemail" value="<?php echo $row["branchemail"]; ?>" class="input" type="email" placeholder="Branch Email">
                                    </div>
                                </div>
                            </div>

                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Contact</label>
                                    <div class="control">
                                        <div class="field has-addons">
                                            <p class="control">
                                                <a class="button is-static">
                                                    +69
                                                </a>
                                            </p>
                                            <p class="control is-expanded">
                                                <input name="branchcontact" id="branchcontact" value="<?php echo $row["branchcontact"]; ?>" type="tel" maxlength="11" class="input" placeholder="Phone Number" required>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Branch Description</label>
                                    <div class="control">
                                        <textarea name="branchdescription" id="branchdescription" class=" form-control textarea" placeholder="Branch Description" required><?php echo $row["branchdescription"]; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3">
                                <div class="field">
                                    <label class="label">Employee Size</label>
                                    <div class="control">
                                        <input name="employeesize" id="employeesize" value="<?php echo $row["employeesize"]; ?>" class="input" type="number" placeholder="Employee Size" maxlength="3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Company Registration No. <small>(Optional)<small></label>
                                    <div class="control">
                                        <input name="companyregno" id="companyregno" value="<?php echo $row["branchregistrationnumber"]; ?>" class="input" type="number" placeholder="Branch Registration Number">
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
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
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
            url: '../../phpaction/editbranch.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
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
                    console.log(data)
                }
            },
        });

    });
</script>