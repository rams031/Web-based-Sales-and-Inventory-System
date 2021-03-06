<?php include "header.php";
$category_query = ("SELECT * FROM `tbl_category` where branchid = $branchid");
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
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <div class="row">
                <div class="columns">
                    <div class="column" style="margin-left:10px;">
                        <span class="icon">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Add New Product</span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="columns">
                    <div class="column is-12">
                      <div class="content">
                        <br>
                        <blockquote>
                        New Product Information
                        </blockquote>
                      </div>                        
                    </div>
                </div>

                <form>
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <div class="columns">
                        <div class="column is-10">
                            <div class="field">
                                <label class="label">Product Code</label>
                                <div class="control">
                                    <input name="productcode" id="productcode" class="input" type="text" placeholder="Product Code" required>
                                </div>
                            </div>
                        </div>
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Assign to Category</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="productcategory" id="productcategory" required>
                                            <option value="" disabled selected>Choose Category</option>
                                            <?php while ($row = mysqli_fetch_assoc($category_data)) { ?>
                                            <option value="<?php echo $row["categoryid"] ?>"><?php echo $row["categoryname"] ?></option>
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
                                    <input name="productname" id="productname" class="input" type="text" placeholder="Product Name">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Product Price</label>
                                <div class="control">
                                    <input name="productprice" id="productprice" class="input" type="number" placeholder="Product Price" required>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Product Wholesale Price</label>
                                <div class="control">
                                    <input name="productwholesaleprice" id="productwholesaleprice" class="input" type="number" placeholder="Product Wholesale Price">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Product Description</label>
                                <div class="control">
                                    <textarea name="productdescription" id="branchdescription" class="textarea" placeholder="Branch Description" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="columns">
                        <div class="column">
                            <div class="submit-button field is-grouped is-grouped-right">
                                <input class="button is-light" id="Submit" name="submit" type="submit">
                            </div>
                        </div>
                    </div>
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

    $('form').on('submit', function(event) {

        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../../phpaction/addnewproduct.php',
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
                }
            },
        });

    });
});
</script>