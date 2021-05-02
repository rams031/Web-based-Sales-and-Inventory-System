<?php
include "header.php";
$branch_data = ("SELECT * FROM `tbl_branch`");
$data = mysqli_query($conn, $branch_data);
?>

<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
    </div>

    <div class="column is-10">

    </div>
</div>

<?php include "scriptlinks.php" ?>
</body>
</html>