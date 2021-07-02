<?php
include "header.php";
$request_query = ("SELECT * FROM `tbl_request` where branchid = $branchid");
$request_data = mysqli_query($conn, $request_query);
?>

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
                            <i class="fas fa-boxes fa-2x"></i>
                        </span>
                        <span class="portal-font has-text-left">Request Stock</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="checkout">
                    <div class="columns">
                        <div class="column">
                            <table class="display" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Branch ID</th>
                                        <th>Branch ID</th>
                                        <th>Supplier</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($request_data)) { ?>
                                        <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                        <tr>
                                            <td><?php echo $row["branchid"]; ?></td>
                                            <td>#<?php echo $row["referenceno"]; ?></td>
                                            <td><?php echo $row["branchname"]; ?></td>
                                            <td><?php echo $row["date"]; ?></td>
                                            <td>
                                                <a href='salesportal-receiving-details.php?receivingid=<?php echo $row["receivingid"]; ?>' class="button is-light is-small">
                                                    View Details
                                                </a>
                                                <a href='salesportal-receiving-editreceiving.php?receivingid=<?php echo $row["receivingid"]; ?>' class="button is-light is-small">
                                                    Edit
                                                </a>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
 
        </div>
    </div>

</div>

<?php include "footer.php" ?>

<script type="text/javascript">

$(document).ready(function() {
    $('.display').DataTable({ responsive: true });
    
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});
</script>

</html>