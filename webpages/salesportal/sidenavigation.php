<?php 
$url = basename($_SERVER['PHP_SELF']);
session_start();
?>

<aside id="sidenav" class="menu animate__animated animate__fadeIn">
    <div id="navbarBasicExample" class="navbar-menu is-shadowless" style="background-color: white;">
        <div id="list-type">

            <p class="menu-label employee-identification">
                <?php if($_SESSION['usertype'] == "sales") { echo "Sales"; } else { echo "error account"; } ?> </br>
                <strong><?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?></strong> 
            </p>

            <div class="list-view">

                <p class="menu-label">
                    General
                </p>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-dashboard.php", "Dashboard", "fas fa-tachometer-alt"); ?>
                    </li>
                </ul>

                <p class="menu-label">
                    Sales
                </p>

                <ul class="menu-list">
                    <li>
                        <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-checkout.php') {
                                        echo "activebox disable";
                                    } else {
                                        echo "selection";
                                    } ?>" href="salesportal-checkout.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-checkout.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                                <span>Check out</span>
                            </span>
                        </a>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-customer.php", "Customer", "fa-user-friends"); 
                        if ($url == 'salesportal-customer.php' || $url == 'salesportal-customer-addcustomer.php' ) { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "salesportal-customer-addcustomer.php", "Add New Customer", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-transaction.php", "Transactions", "fa-file-invoice-dollar"); ?>
                        
                    </li>
                </ul>

                <p class="menu-label">
                    Inventory
                </p>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-inventory.php", "Manage Inventory", "fa-tachometer-alt");
                        if ($url == 'salesportal-inventory.php' || $url == 'salesportal-inventory-addinventory.php' ) { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "salesportal-inventory-addinventory.php", "Add New Inventory", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-product.php", "Manage Product", "fa-archive"); 
                        if ($url == 'salesportal-product.php' || $url == 'salesportal-product-addproduct.php' ) { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "salesportal-product-addproduct.php", "Add New Product", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-category.php", "Product Category", "fa-grip-lines");
                        if ($url == 'salesportal-category.php' || $url == 'salesportal-category-addcategory.php') { ?>
                        <ul>
                            <li>
                            <?php sidenav($url, "salesportal-category-addcategory.php", "Add new Category", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-supplier.php", "Supplier", "fa-truck-loading")?>
                        <?php if ($url == 'salesportal-supplier.php' || $url == "salesportal-supplier-addsupplier.php") { ?>
                        <ul>
                            <li>
                            <?php sidenav($url, "salesportal-supplier-addsupplier.php", "Add New Supplier", "fa-user-plus"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-receiving.php", "Receiving", "fa-truck");
                        if ($url == 'salesportal-receiving.php' || $url == 'salesportal-receiving-addnewreceiving.php') { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "salesportal-receiving-addnewreceiving.php", "Add New Receiving ", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-requeststock.php') {
                                        echo "activebox disable";
                                    } else {
                                        echo "selection";
                                    } ?>" href="salesportal-requeststock.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-requeststock.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-boxes"></i>
                                </span>
                                <span>Request Stock</span>
                            </span>
                        </a>
                    </li>
                </ul>

                <p class="menu-label">
                    Documents
                </p>

                <ul class="menu-list">
                    <li>
                        <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-reports.php') {
                                        echo "activebox disable";
                                    } else {
                                        echo "selection";
                                    } ?>" href="salesportal-reports.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-reports.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-file-alt"></i>
                                </span>
                                <span>Reports</span>
                            </span>
                        </a>
                    </li>
                </ul>

                <p class="menu-label">
                    Account
                </p>

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