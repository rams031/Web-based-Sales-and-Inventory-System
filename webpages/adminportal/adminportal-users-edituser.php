<?php
include "header.php";
$userid = $_GET['userid'];
$user_getdata = ("SELECT * FROM `tbl_users` 
JOIN `tbl_branch` ON tbl_users.branchid = tbl_branch.branchid where userid = $userid");

$data = mysqli_query($conn, $user_getdata);

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
                        <span class="portal-font  has-text-left">Edit Users</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>">
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">First Name</label>
                                <div class="control">
                                    <input name="firstname" id="firstname" class="input" type="text" value="<?php echo $row["firstname"] ?>" placeholder="Firstname" required>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Last Name</label>
                                <div class="control">
                                    <input name="lastname" id="lastname" class="input" type="text" value="<?php echo $row["lastname"] ?>" placeholder="Lastname" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Account Username</label>
                                <div class="control">
                                    <input name="username" id="username" class="input" type="text" value="<?php echo $row["username"] ?>" placeholder="Username" required>
                                </div>
                            </div>
                            <p id="available" class="help is-success">This username is Available</p>
                            <p id="existing" class="help is-danger">This username is Existing</p>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Account Password</label>
                                <div class="control">
                                    <input name="userpassword" id="userpassword" class="input" type="password" value="<?php echo $row["userpassword"] ?>"placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Gender</label>
                                <div class="control">
                                    <input name="usergender" id="usergender" class="input" type="text" value="<?php echo $row["gender"] ?>" placeholder="Gender" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Account Usertype</label>
                                <div class="control">
                                    <input name="usertype" id="usertype" class="input" type="text" value="<?php echo $row["usertype"] ?>"  placeholder="User Type" disabled>
                                </div>
                            </div>
                              </div>
                        <div class="column is-3 Dropdown-usertype">
                            <div class="field">
                                <label class="label">Assign to What Branch</label>
                                <div class="control">
                                    <input name="userbranch" id="userbranch" class="input" type="text" value="<?php echo $row["branchname"] ?>" placeholder="User Branch" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Contact Number</label>
                                <div class="control">
                                    <input name="usercontact" id="usercontact" type="text" class="input" minlength="8" value="<?php echo $row["contacts"] ?>" placeholder="Phone Number" required>
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
                <?php } ?>
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

    $("#available").hide();
    $("#existing").hide();

    $("#username").bind('input', function() {
        var username = $("#username").val();
        $.ajax({
            type: 'POST',
            url: '../../phpaction/username-validation.php',
            data: {
                username: username
            },
            success: function(data) {
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

    $('#usercontact').on("input", function () {     
        if (this.value.length > 11)         
            this.value = this.value.slice(0,11); 
    });


    $('form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../phpaction/edituser.php',
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
                }
            },
        });
    });
});
</script>

</html>