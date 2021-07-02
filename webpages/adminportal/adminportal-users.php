<?php
include "header.php";
$user_query = ("SELECT * FROM `tbl_users` 
JOIN `tbl_branch` ON tbl_users.branchid = tbl_branch.branchid");
$data = mysqli_query($conn, $user_query);
?>

<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
    </div>

    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row is-full">
                <div class="columns">
                <div class="column">                        
                    <div style="margin-bottom:50px;">
                        <span class="icon">
                            <i class="fas fa-user fa-2x"></i>
                        </span>
                        <span class="portal-font">Manage Users</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th>User Role</th>
                                    <th>Branch</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                <input type="hidden" value="<?php echo $row["userid"]; ?>" id="userid">
                                <tr>
                                    <td><?php echo ($row["firstname"] . " " .  $row["lastname"]) ?></td>
                                    <td><?php echo $row["contacts"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["gender"]; ?></td>
                                    <td><?php echo $row["usertype"]; ?></td>
                                    <td><?php echo $row["branchname"]; ?></td>
                                    <td>
                                        <a href='adminportal-users-edituser.php?userid=<?php echo $row["userid"]; ?>' class="button is-light is-small">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "footer.php" ?>
</body>

<script type="text/javascript">
    $('.display').DataTable({ responsive: true });

    $(document).ready(function() {
        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });
</script>

</html>