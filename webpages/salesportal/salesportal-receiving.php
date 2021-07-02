<?php
include "header.php";
$product_query = ("SELECT * FROM `tbl_receiving` 
JOIN `tbl_supplier` ON tbl_supplier.supplierid=tbl_receiving.supplierid
JOIN `tbl_branch` ON tbl_supplier.branchsupplierid=tbl_branch.branchid 
where tbl_receiving.branchid = $branchid");
$data = mysqli_query($conn, $product_query);
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
                            <i class="fas fa-truck fa-2x"></i>
                        </span>
                        <span class="portal-font">Manage Receiving</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Receiving ID</th>
                                    <th>Reference No</th>
                                    <th>Supplier</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                    <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["receivingid"]; ?></td>
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
