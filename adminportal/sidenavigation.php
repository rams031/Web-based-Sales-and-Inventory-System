<?php 
$url = basename($_SERVER['PHP_SELF']);
session_start();
?>

<aside id="sidenav" class="menu animate__animated animate__fadeIn__faster">
    <div id="navbarBasicExample" class="navbar-menu is-shadowless" style="background-color: white;">
        <div id="list-type">

            <p class="menu-label employee-identification">
                <?php if($_SESSION['usertype'] == "admin") { echo "Administrator"; } else { echo "error account"; } ?> </br>
                <strong><?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?></strong> 
            </p>

            <div class="list-view">

                <p class="menu-label"> General</p>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-dashboard.php", "Dashboard", "fa-tachometer-alt")?>
                    </li>
                </ul>

                <p class="menu-label"> Inventory</p>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-inventory.php", "Manage Inventory", "fa-tachometer-alt");
                        if ($url == 'adminportal-inventory.php' || $url == 'adminportal-inventory-addinventory.php' ) { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "adminportal-inventory-addinventory.php", "Add New Inventory", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-product.php", "Manage Product", "fa-archive"); 
                        if ($url == 'adminportal-product.php' || $url == 'adminportal-product-addproduct.php' ) { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "adminportal-product-addproduct.php", "Add New Product", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-category.php", "Product Category", "fa-grip-lines");
                        if ($url == 'adminportal-category.php' || $url == 'adminportal-category-addcategory.php') { ?>
                        <ul>
                            <li>
                            <?php sidenav($url, "adminportal-category-addcategory.php", "Add new Category", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-supplier.php", "Supplier", "fa-truck-loading")?>
                        <?php if ($url == 'adminportal-supplier.php' || $url == "adminportal-supplier-addsupplier.php") { ?>
                        <ul>
                            <li>
                            <?php sidenav($url, "adminportal-supplier-addsupplier.php", "Add New Supplier", "fa-user-plus"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-receiving.php", "Receiving", "fa-truck");
                        if ($url == 'adminportal-receiving.php' || $url == 'adminportal-receiving-addnewreceiving.php') { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "adminportal-receiving-addnewreceiving.php", "Add New Receiving ", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <p class="menu-label"> Branch </p>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-branch.php", "Manage Branch", "fa-store"); 
                        if ($url == 'adminportal-branch.php' || $url == 'adminportal-branch-addbranch.php') { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "adminportal-branch-addbranch.php", "Add New Branch", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <p class="menu-label"> Users </p>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "adminportal-users.php", "Manage Users", "fa-users"); 
                        if ($url == 'adminportal-users.php' || $url == 'adminportal-users-adduser.php' || $url == 'adminportal-users-edituser.php') { ?>
                        <ul>
                            <li>
                            <?php sidenav($url, "adminportal-users-adduser.php", "Add New User", "fa-user-plus"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <p class="menu-label"> Account </p>

                <ul class="menu-list">
                    <li style="list-style-type:none;">
                        <a id="logout" class="selection">
                            <span class="icon-text ">
                                <span class="icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                <span>Log Out</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

<?php include "footer.php" ?>

<?php
function sidenav($relative, $directory, $navname , $icon) {

    if ($relative == $directory) { $activebox = "activebox disabled"; $selection = "activebox-font-color"; } else { $activebox = "selection";}

    echo "<a class='$activebox'";
    echo "href='$directory'>";
    echo "<span class='icon-text $selection'>";
    echo "<span class='icon'><i class='fas $icon'></i></span>";
    echo "<span>$navname</span>";
    echo "</span>";
    echo "</a>";
}
?>
