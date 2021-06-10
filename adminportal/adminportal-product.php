<?php
include "header.php";
$product_query = ("SELECT * FROM `tbl_product` where branchid = $branchid");
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
                        <span class="portal-font">Manage Products</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Wholesaleprice</th>
                                    <th>Product Description</th>
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
                                        <td><?php echo $row["productwholesaleprice"]; ?></td>
                                        <td><?php echo $row["productdescription"]; ?></td>
                                        <td>
                                            <a href='adminportal-product-editproduct.php?productid=<?php echo $row["productid"]; ?>' class="button is-light is-small">
                                                Edit Product
                                            </a>
                                            <a onclick=DeleteBranch(<?php echo $row["branchid"]; ?>) class="button is-light is-small">
                                                construction

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
