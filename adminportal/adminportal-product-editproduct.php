<?php include "header.php";
$productid = $_GET['productid'];
$product_query = 
("SELECT * FROM `tbl_product`
JOIN `tbl_category` ON tbl_product.categoryid=tbl_category.categoryid WHERE tbl_product.productid = $productid");
$category_query = ("SELECT * FROM `tbl_category`
JOIN `tbl_product` ON tbl_product.categoryid=tbl_category.categoryid WHERE tbl_product.productid != $productid GROUP BY categoryname");
$product_data = mysqli_query($conn, $product_query); 
$category_data = mysqli_query($conn, $category_query);
?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- BRANCH STOCK-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10 ">
        <div class="crumblerows">
            <div class="crumblerow">
                <div class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li>
                            <a href="adminportal-product.php">
                                <span class="icon is-small">
                                    <i class="fas fa-archive " aria-hidden="true"></i>
                                </span>
                                <span>Manage Product</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </span>
                                <span>Edit Product</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row">
                <div class="columns">
                    <div class="column" style="margin-left:10px;">
                        <span class="icon">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Edit Product</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <input type="hidden" id="productid" name="productid" value="<?php echo $_GET['productid'] ?>">
                    <?php
                    while ($rowfield = mysqli_fetch_assoc($product_data)) { 
                    ?>
                    <div class="columns">
                        <div class="column is-10">
                            <div class="field">
                                <label class="label">Product Code</label>
                                <div class="control">
                                    <input name="productcode" id="productcode" class="input" value="<?php echo $rowfield["productcode"] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="column is-2 ">
                            <div class="field">
                                <label class="label">Assign to Category</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="productcategory" id="productcategory" required>   
                                            <option value="<?php echo $row["categoryid"] ?>" selected><?php echo $row["categoryname"] ?></option>
                                            <?php while ($row = mysqli_fetch_assoc($category_data)) { ?>
                                                <option value="<?php echo $row["categoryid"] ?>" selected><?php echo $row["categoryname"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Product Name</label>
                                <div class="control">
                                    <input name="productname" id="productname" value="<?php echo $rowfield["productname"] ?>" class="input" type="text" placeholder="Product Name">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Product Price</label>
                                <div class="control">
                                    <input name="productprice" id="productprice" value="<?php echo $rowfield["productprice"] ?>"  class="input" type="number" placeholder="Product Price" required>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Product Wholesale Price</label>
                                <div class="control">
                                    <input name="productwholesaleprice" id="productwholesaleprice" value="<?php echo $rowfield["productwholesaleprice"] ?>" class="input" type="number" placeholder="Product Wholesale Price">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Product Description</label>
                                <div class="control">
                                    <textarea name="productdescription" id="branchdescription"  class="textarea" placeholder="Branch Description" required><?php echo $rowfield["productdescription"] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="columns">
                        <div class="column">
                            <div class="submit-button field is-grouped is-grouped-right">
                                <input class="button is-light" id="submit" name="submit" type="submit">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
$(document).ready(function() {
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    console.log($('form').serialize())
    $('form').on('submit', function(event) {

        event.preventDefault();
        console.log($('form').serialize())

        $.ajax({
            type: 'POST',
            url: '../../phpaction/editproduct.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
                    swal("Product Data Saved", "Succesfully", "success", {
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "adminportal-product.php"
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