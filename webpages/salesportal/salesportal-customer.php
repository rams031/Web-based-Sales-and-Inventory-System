<?php
include "header.php";
$inventory_data = ("SELECT *  FROM `tbl_customer`
JOIN `tbl_branch` ON tbl_branch.branchid=tbl_customer.branchid 
WHERE tbl_branch.branchid = $branchid 
");
$data = mysqli_query($conn, $inventory_data);
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
                            <i class="fas fa-user-friends fa-2x"></i>
                        </span>
                        <span class="portal-font">Manage Customer</span></div>
                        <div class="column">
                            <table class="display" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Since (date)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                        <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                        <tr>
                                            <td><?php echo $row["customerid"]; ?></td>
                                            <td><?php echo $row["customername"]; ?></td>
                                            <td><?php echo $row["customerdate"]; ?></td>
                                            <td>
                                                <a href='salesportal-customer-editcustomer.php?customerid=<?php echo $row["customerid"]; ?>' class="button is-light is-small">
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

$(document).ready(function() {
    $('.display').DataTable({ responsive: true });
    
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});
</script>

</html>