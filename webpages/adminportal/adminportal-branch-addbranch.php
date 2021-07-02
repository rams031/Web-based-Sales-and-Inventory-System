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
                                    <input  name="branchname" id="branchname" class="input" type="text" placeholder="Branch Name" required>
                                </div>
                            </div>
                            <p id="available" class="help is-success">This Branch Name is Available</p>
                            <p id="existing" class="help is-danger">This Branch Name is already in the list</p>
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
                        <div class="column">
                            <div class="field">
                                <label class="label">Branch Email</label>
                                <div class="control">
                                    <input name="branchemail" id="branchemail" class="input" type="email" placeholder="Branch Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Branch Contact</label>
                                <div class="control">
                                    <input name="branchcontact" id="branchcontact" type="tel" maxlength="11" class="input" placeholder="Phone Number" required>
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
                        <div class="column">
                            <div class="field">
                                <label class="label">Company Registration No. <small>(Optional)<small></label>
                                <div class="control">
                                    <input name="companyregno" id="companyregno" class="input" type="number" placeholder="Branch Registration Number">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Branch Type</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="branchtype" id="branchtype" required>
                                            <option value="" disabled selected>Choose Usertype</option>
                                            <option value="main">Main</option>
                                            <option value="branch">Branch</option>
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

    $("#available").hide();
    $("#existing").hide();

    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $('#branchcontact').on("input", function () {     
        if (this.value.length > 11)         
            this.value = this.value.slice(0,11); 
    });

    $("#branchname").bind('input', function() {
        var branchname = $("#branchname").val();
        
        $.ajax({
            type: 'POST',
            url: '../../phpaction/branchname-validation.php',
            data: {
                branchname: branchname
            },
            success: function(data) {
                if (branchname === "") {
                    $("#available").hide();
                    $("#existing").hide();
                    $("#branchname").removeClass("is-success");
                    $("#branchname").removeClass("is-danger");
                }
                else {

                    if (data === "existing") {
                        $('#Submit').prop("disabled",true);
                        $("#available").hide();
                        $("#existing").show();
                        $("#branchname").addClass("is-danger");
                    } else if (data === "available") {
                        $('#Submit').prop("disabled",false);
                        $("#existing").hide();
                        $("#available").show();
                        $("#branchname").removeClass("is-danger")
                        $("#branchname").addClass("is-success");
                    }
                }
                    
            }
        });
    });

    $('form').on('submit', function(event) {

        event.preventDefault();

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
                }
            },
        });

    });
});
</script>