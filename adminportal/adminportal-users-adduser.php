<?php
include "header.php";
$branch_main_data = ("SELECT * FROM `tbl_branch` where branchtype = 'main'");
$main_data = mysqli_query($conn, $branch_main_data);

$branch_data = ("SELECT * FROM `tbl_branch` where branchtype = 'branch'");
$data = mysqli_query($conn, $branch_data);
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
                            <i class="fas fa-user-plus fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Add New Users</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form id="Addnewuser-form">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">First Name</label>
                                <div class="control">
                                    <input name="firstname" id="firstname" class="input" type="text" placeholder="Firstname" required>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Last Name</label>
                                <div class="control">
                                    <input name="lastname" id="lastname" class="input" type="text" placeholder="Lastname" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Account Username</label>
                                <div class="control">
                                    <input name="username" id="username" class="input" type="text" placeholder="Username" required>
                                </div>
                                <p id="available" class="help is-success">This username is Available</p>
                                <p id="existing" class="help is-danger">This username is Existing</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Account Password</label>
                                <div class="control">
                                    <input name="userpassword" id="userpassword" class="input" type="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Gender</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="usergender" id="usergender" required>
                                            <option value="" disabled selected>Choose Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Account Usertype</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="usertype" id="usertype" required=true>
                                            <option value="" disabled selected>Choose Usertype</option>
                                            <option value="sales">Sales</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3 Dropdown-usertype">
                            <div class="field">
                                <label class="label">Assign to What Branch</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="userbranch" id="userbranch" required>
                                            <option value="" disabled selected>Choose Branch to Assign</option>
                                            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                            <option value="<?php echo $row["branchid"] ?>"><?php echo $row["branchname"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3 Dropdown-usertype-main">
                            <div class="field">
                                <label class="label">Assign to What Branch</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="mainbranch" id="mainbranch" required>
                                            <option value="" disabled selected>Choose Branch to Assign</option>
                                            <?php while ($row = mysqli_fetch_assoc($main_data)) { ?>
                                            <option value="<?php echo $row["branchid"] ?>"><?php echo $row["branchname"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Contact Number</label>
                                <div class="control">
                                    <div class="field has-addons">
                                        <p class="control">
                                            <a class="button is-static">
                                                +69
                                            </a>
                                        </p>
                                        <p class="control is-expanded">
                                            <input name="usercontact" id="usercontact" type="tel" maxlength="11" class="input" placeholder="Phone Number" required>
                                        </p>
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

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
$(document).ready(function() {
    $(".Dropdown-usertype").hide();
    $(".Dropdown-usertype-main").hide();
    $("#available").hide();
    $("#existing").hide();
    $('#Submit').prop("disabled",true);
    $("#usertype").change(function() {
        console.log($("#usertype").val())
        if ($("#usertype").val() == "sales") {
            $(".Dropdown-usertype").show(500);
            $(".Dropdown-usertype-main").hide(500);
            $("#mainbranch").removeAttr('required');
            $("#userbranch").attr('required', 'required')
        } else if ($("#usertype").val() == "admin") {
            $(".Dropdown-usertype-main").show(500);
            $(".Dropdown-usertype").hide(500);
            $("#userbranch").removeAttr('required');
            $("#mainbranch").attr('required', 'required')
        } 
    });
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
    $("input").bind('input', function() {
        var username = $("#username").val();
        $.ajax({
            type: 'POST',
            url: '../../phpaction/username-validation.php',
            data: {
                username: username
            },
            success: function(data) {
                console.log(data)
                if (username === "") {
                    $("#available").hide();
                    $("#existing").hide();
                    $("#username").removeClass("is-success");
                    $("#username").removeClass("is-danger");
                }
                else {
                    if (data === "existing") {
                        $('#Submit').prop("disabled",true);
                        $("#available").hide();
                        $("#existing").show();
                        $("#username").removeClass("is-success").addClass("is-danger");
                    } else if (data === "available") {
                        $('#Submit').prop("disabled",false);
                        $("#existing").hide();
                        $("#available").show();
                        $("#username").removeClass("is-danger").addClass("is-success");
                        
                    }
                }
            }
        });
    });
    $('form').on('submit', function(event) {
        event.preventDefault();
        console.log($('form').serialize())
        $.ajax({
            type: 'POST',
            url: '../../phpaction/addnewuser.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
                    swal("User Data Saved", "Succesfully", "success", {
                        closeOnEsc: false,
                        closeOnClickOutside: false,
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "adminportal-users.php"
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

</html>