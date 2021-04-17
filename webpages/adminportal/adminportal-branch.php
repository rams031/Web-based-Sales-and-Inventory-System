<?php
include "header.php";
$branch_data = ("SELECT * FROM `tbl_branch`");
$data = mysqli_query($conn, $branch_data);
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
                            <i class="fas fa-store fa-2x"></i>
                        </span>
                        <span class="portal-font">Manage Branch</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Branch name</th>
                                    <th>Branch Address</th>
                                    <th>Branch Email</th>
                                    <th>Branch Contact</th>
                                    <th>Branch Employee Size</th>
                                    <th>Branch Date Started</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                    <input id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["branchname"]; ?></td>
                                        <td><?php echo $row["branchaddress"]; ?></td>
                                        <td><?php echo $row["branchemail"]; ?></td>
                                        <td><?php echo $row["branchcontact"]; ?></td>
                                        <td><?php echo $row["employeesize"]; ?></td>
                                        <td><?php echo $row["datestarted"]; ?></td>
                                        <td>
                                            <a href='adminportal-branch-editbranch.php?branchid=<?php echo $row["branchid"]; ?>' class="button is-light is-small">
                                                Edit Branch
                                            </a>
                                            <a onclick=DeleteBranch(<?php echo $row["branchid"]; ?>) class="button is-light is-small">
                                                
                                                <i class="fas fa-trash-alt"></i>
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

<?php include "scriptlinks.php" ?>

</body>

<script type="text/javascript">

function DeleteBranch(bid) {

    swal("You won't be able to revert this!", {
        title: 'Are you sure?',
        dangerMode: true,
        cancel: true,
        buttons: true,
        closeOnEsc: false,
        closeOnClickOutside: false,
    }).then((result) => {
        console.log(result)
        if (result == true) {
            $.ajax({
                url: '../../phpaction/deletebranch.php',
                method: 'POST',
                data: {
                    branchid: bid,
                },
                success: function(data) {
                    if (data === "success") {
                        swal("Branch Data Deleted", "Succesfully", "success", {
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
            })
            
        }
    });
}

$(document).ready(function() {
    $('.display').DataTable({ responsive: true });
    
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});
</script>

</html>