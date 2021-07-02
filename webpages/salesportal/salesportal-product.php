<?php
include "header.php";
$product_query = ("SELECT * FROM `tbl_product` 
JOIN `tbl_category` ON tbl_product.categoryid = tbl_category.categoryid");
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
                            <i class="fas fa-archive fa-2x"></i>
                        </span>
                        <span class="portal-font">Products List</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                    <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["productcode"]; ?></td>
                                        <td><?php echo $row["productname"]; ?></td>
                                        <td><?php echo $row["productprice"]; ?></td>
                                        <td><?php echo $row["categoryname"]; ?></td>
                                        <td>
                                            <a href='salesportal-stock-editstock.php?stockid=<?php echo $row["stockid"]; ?>' class="button is-light is-small">
                                                View Details
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
