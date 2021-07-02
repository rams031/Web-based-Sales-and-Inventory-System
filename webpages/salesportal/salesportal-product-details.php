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
                        <span class="portal-font">Products Details</span></div>
                    <div class="column">

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
