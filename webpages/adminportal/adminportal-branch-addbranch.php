<?php include "header.php" ?>
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
                            <i class="fas fa-plus-circle fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Add New Branch</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Branch Name</label>
                                <div class="control">
                                    <input name="branchname" id="branchname" class="input" type="text" placeholder="Branch Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">TIN <small>(Optional)<small></label>
                                <div class="control">
                                    <input name="tinno" id="tinno" class="input" type="text" placeholder="Tin(Number)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-3">
                            <div class="field">
                                <label class="label">Branch City</label>
                                <div class="control">
                                    <input name="branchcity" id="branchcity" class="input" type="text" placeholder="Branch City" required>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Branch Address</label>
                                <div class="control">
                                    <input name="branchaddress" id="branchaddress" class="input" type="text" placeholder="Branch Address" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column ">
                            <div class="field">
                                <label class="label">Branch Email <small>(Optional)<small></label>
                                <div class="control">
                                    <input name="branchemail" id="branchemail" class="input" type="email" placeholder="Branch Email">
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
                                            <input name="branchcontact" id="branchcontact" type="tel" maxlength="11" class="input" placeholder="Phone Number" required>
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
                                    <textarea name="branchdescription" id="branchdescription" class="textarea" placeholder="Branch Description" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-3">
                            <div class="field">
                                <label class="label">Employee Size</label>
                                <div class="control">
                                    <input name="employeesize" id="employeesize" class="input" type="number" placeholder="Employee Size" required>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Company Registration No. <small>(Optional)<small></label>
                                <div class="control">
                                    <input name="companyregno" id="companyregno" class="input" type="number" placeholder="Branch Registration Number">
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
            url: '../../phpaction/addnewbranch.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
                    swal("Branch Data Saved", "Succesfully", "success", {
                        buttons: false,
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