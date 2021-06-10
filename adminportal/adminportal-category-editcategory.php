<?php include "header.php" ;
$categoryid = $_GET['categoryid'];
$category_data = ("SELECT * FROM `tbl_category` WHERE categoryid = $categoryid");
$data = mysqli_query($conn, $category_data);
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
                            <a href="adminportal-category.php">
                                <span class="icon is-small">
                                    <i class="fas fa-file-alt" aria-hidden="true"></i>
                                </span>
                                <span>Manage Category</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a disabled>
                                <span class="icon is-small">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </span>
                                <span>Edit Category</span>
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
                        <span class="portal-font  has-text-left">Edit Product Category</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <input name="categoryid" id="categoryid" value="<?php echo $categoryid; ?>" type="hidden" >
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Product Category Name</label>
                                <div class="control">
                                    <input name="categoryname" id="categoryname" value="<?php echo $row['categoryname'] ?>" class="input" type="text" placeholder="Category Name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Product Category Description</label>
                                <div class="control">
                                    <textarea name="categorydescription" id="categorydescription" class="textarea" placeholder="Category Description" required><?php echo $row['categorydescription'] ?></textarea>
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
            url: '../../phpaction/editcategory.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
                    swal("Category Data Saved", "Succesfully", "success", {
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "adminportal-category.php"
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
