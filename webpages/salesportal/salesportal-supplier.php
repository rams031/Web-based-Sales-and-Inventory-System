<?php
include "header.php";
$product_query = ("SELECT * FROM `tbl_supplier` 
JOIN `tbl_branch` ON tbl_supplier.branchsupplierid = tbl_branch.branchid where tbl_supplier.branchid = $branchid");
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
                            <i class="fas fa-truck-loading fa-2x"></i>
                        </span>
                        <span class="portal-font">Manage Supplier <small>(Branch)</small></span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Supplier ID</th>
                                    <th>Supplier Name</th>
                                    <th>Supplier Address</th>
                                    <th>Supplier Contact</th>
                                    <th>Since</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                    <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["supplierid"]; ?></td>
                                        <td><?php echo $row["branchname"]; ?></td>
                                        <td><?php echo $row["branchaddress"]; ?></td>
                                        <td><?php echo $row["branchcontact"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
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
