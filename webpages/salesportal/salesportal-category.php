<?php
include "header.php";
$category_data = ("SELECT * FROM `tbl_category`");
$data = mysqli_query($conn, $category_data);
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
                            <i class="fas fa-file-alt  fa-2x"></i>
                        </span>
                        <span class="portal-font">Product Category</span></div>
                    <div class="column">
                        <table class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Category name</th>
                                    <th>Product Category Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                                    <input class="responsive" width="100%" id="branchid" name="branchid" type="hidden" value="<?php echo $row["branchid"]; ?>" >
                                    <tr>
                                        <td><?php echo $row["categoryname"]; ?></td>
                                        <td><?php echo $row["categorydescription"]; ?></td>
                                        <td>
                                            <a href='adminportal-category-editcategory.php?categoryid=<?php echo $row["categoryid"]; ?>' class="button is-light is-small">
                                                Edit Category
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