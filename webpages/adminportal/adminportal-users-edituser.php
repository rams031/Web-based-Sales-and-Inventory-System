<?php include "header.php";
$userid = $_GET['userid'];
$user_getdata = ("SELECT * FROM `tbl_users` WHERE userid='$userid' limit 1");
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
            <div class="row is-full">
                <div class="columns">
                    <div class="column portal-font-title" style="margin-left:10px;">
                        <span class="icon">
                            <i class="fas fa-user-plus fa-2x"></i>
                        </span>
                        <span class="portal-font is-size-4 has-text-left">Edit User Account</span>
                    </div>
                </div>
            </div>
            <?php while ($row = mysqli_fetch_assoc($user_getdata)) {    ?>
                <div class="row is-full">
                    <form>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">First Name</label>
                                    <div class="control">
                                        <input name="firstname" id="firstname" class="input" type="text" value="<?php echo $row["firstname"]; ?>" placeholder="Firstname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Last Name</label>
                                    <div class="control">
                                        <input name="lastname" id="lastname" class="input" type="text" value="<?php echo $row["lastname"]; ?>" placeholder="Lastname" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Account Username</label>
                                    <div class="control">
                                        <input name="username" id="username" class="input" type="text" value="<?php echo $row["username"]; ?>" placeholder="Username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Account Password</label>
                                    <div class="control">
                                        <input name="userpassword" id="userpassword" class="input" type="password" value="<?php echo $row["userpassword"]; ?>" placeholder="Password" Disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-2">
                                <div class="field">
                                    <label class="label">Gender</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="usergender" id="usergender" required>
                                                <?php
                                                if ($row["gender"] == 'male') {
                                                    echo '<option value="male">Male</option>';
                                                    echo '<option value="female">Female</option>';
                                                } elseif ($row["gender"]  == 'female') {
                                                    echo '<option value="female">Female</option>';
                                                    echo '<option value="male">Male</option>';
                                                } else {
                                                    echo '<option value="" disabled selected>Choose Gender</option>';
                                                    echo '<option value="male">Male</option>';
                                                    echo '<option value="female">Female</option>';
                                                }
                                                ?>
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
                                        <div class="select">
                                            <select name="usertype" id="usertype" required=true>
                                                <?php
                                                if ($row["usertype"] == 'sales') {
                                                    echo '<option value="sales">Sales</option>';
                                                    echo '<option value="admin">Admin</option>';
                                                } elseif ($row["usertype"] == 'admin') {
                                                    echo '<option value="admin">Admin</option>';
                                                    echo '<option value="sales">Sales</option>';
                                                } else {
                                                    echo '<option value="" disabled selected>Choose Usertype</option>';
                                                    echo '<option value="sales">Sales</option>';
                                                    echo '<option value="admin">Admin</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-2 Dropdown-usertype">
                                <div class="field">
                                    <label class="label">Assign to What Branch</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="userbranch" id="userbranch" required>
                                                <option value="" disabled selected>Choose Branch to Assign</option>
                                                <option value="1">branch1</option>
                                                <option value="2">branch2</option>
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
        $(".Dropdown-usertype").hide();

        $("#usertype").change(function() {
            console.log($("#usertype").val())
            if ($("#usertype").val() == "sales") {
                $(".Dropdown-usertype").show(500);
                $("#userbranch").attr('required', 'required')
            } else {
                $(".Dropdown-usertype").hide(500);
                $("#userbranch").removeAttr('required');
            }
        });

        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });

        //$('form').bind('click', function(event) {
        //
        //    event.preventDefault();
        //    console.log($('form').serialize())
        //    if ($("#userbranch").val() == "") { console.log("ndfgdfgull")}
        //
        //    $.ajax({
        //        type: 'POST',
        //        url: '../../phpaction/addnewuser.php',
        //        data: $('form').serialize(),
        //        success: function(data) {
        //            console.log(data)
        //        }
        //    });
        //});

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
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
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