<?php
include "header.php";
$category_data = ("SELECT * FROM `tbl_category` where branchid = $branchid");
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
                        <span class="portal-font">Manage Category</span></div>
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
                                                Edit
                                            </a>
                                            <a onclick=deletecategory(<?php echo $row["categoryid"]; ?>) class="button is-light is-small">
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

    function deletecategory(id) {    
        swal("You won't be able to revert this!", {
            title: 'Are you sure?',
            dangerMode: true,
            cancel: true,
            buttons: true,
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((result) => {
            if (result == true) {
                $.ajax({
                    url: '../../phpaction/deletecategory.php',
                    method: 'POST',
                    data: {
                        categoryid: id,
                    },
                    success: function(data) {
                        if (data === "success") {
                            swal("Category Data Deleted", "Succesfully", "success", {
                                buttons: false,
                                closeOnEsc: false,
                                closeOnClickOutside: false,
                                timer: 4000,
                                closeOnClickOutside: false
                            }), setTimeout(function() {
                                top.location.href = "adminportal-category.php"
                            }, 2000);
                        } else {
                            swal("Database Error", "Make sure the input is correct", "error")
                        }
                    },
                })  

            }
        });
    }
    $(document).ready(function() {
        $('.display').DataTable({ responsive: true });
        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });
</script>

</html>