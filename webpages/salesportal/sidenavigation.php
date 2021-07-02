<?php 
$url = basename($_SERVER['PHP_SELF']);
session_start();

include '../database/dbsql.php';

$branch_query = ("SELECT * FROM `tbl_branch` WHERE branchid = $branchid");
$branch_data = mysqli_query($conn, $branch_query);

while ($row = mysqli_fetch_assoc($branch_data)) {
    $branchname = $row["branchname"];
}
?>

<aside id="sidenav" class="menu animate__animated animate__fadeIn">
    <div id="navbarBasicExample" class="navbar-menu is-shadowless" style="background-color: white;">
        <div id="list-type">

            <p class="menu-label employee-identification">
                <?php if($_SESSION['usertype'] == "sales") { echo "Sales"; } else { echo "error account"; } ?> </br>
                <strong><?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?></strong> </br>
                <strong>(<?php echo $branchname ?> Branch)</strong> 
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
                        <?php sidenav($url, "salesportal-checkout-orders.php", "Check Out", "fas fa-shopping-cart"); ?>
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
                        <?php sidenav($url, "salesportal-stock.php", "Manage Stock", "fa-box-open");
                        if ($url == 'salesportal-stock.php' || $url == 'salesportal-stock-addstock.php' ) { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "salesportal-stock-addstock.php", "Add New Stock", "fa-plus-circle"); }?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-inventory.php", "Inventory Logs", "fa-tachometer-alt");
                        if ($url == 'salesportal-inventory.php' || $url == 'salesportal-inventory-addinventory.php' ) { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "salesportal-inventory-addinventory.php", "Add New Inventory", "fa-plus-circle"); }?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="menu-list">
                    <li>
                        <?php sidenav($url, "salesportal-product.php", "Product List", "fa-archive");  ?>
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
                        <?php sidenav($url, "salesportal-requeststock.php", "Request Stock", "fa-boxes");  
                        if ($url == 'salesportal-requeststock.php' || $url == 'salesportal-requeststock-createrequest.php') { ?>
                        <ul>
                            <li>
                                <?php sidenav($url, "salesportal-requeststock-createrequest.php", "Create new request", "fa-plus-circle"); } ?>
                            </li>
                        </ul>
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