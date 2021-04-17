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
                        <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-inventory.php') {
                                        echo "activebox disabled";
                                    } else {
                                        echo "selection";
                                    } ?>" href="adminportal-inventory.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-inventory.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </span>
                                <span> Manage Inventory</span>
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label"> Branch</p>

                <ul class="menu-list">
                    <li>
                        <a class="<?php
                                    if (basename($_SERVER['PHP_SELF']) == 'adminportal-branch.php') {
                                        echo "activebox disabled";
                                    } else {
                                        echo "selection";
                                    } ?>" href="adminportal-branch.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-branch.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-store"></i>
                                </span>
                                <span>Manage Branch</span>
                            </span>
                        </a>
                        <?php if ($url == 'adminportal-branch.php' || $url == 'adminportal-branch-addbranch.php') { ?>
                            <ul>
                                <li>
                                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-branch-addbranch.php') {
                                                    echo "activebox disabled";
                                                } else {
                                                    echo "selection";
                                                } ?>" href="adminportal-branch-addbranch.php">
                                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-branch-addbranch.php') {
                                                                    echo "activebox-font-color";
                                                                } ?>">
                                            <span class="icon">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span>Add New Branch</span>
                                        </span>
                                    </a>
                                <?php } ?>
                                </li>
                            </ul>
                    </li>
                </ul>

                <p class="menu-label"> Users</p>

                <ul class="menu-list">
                    <li>
                        <a class="<?php

                                    if (basename($_SERVER['PHP_SELF']) == 'adminportal-users.php') {
                                        echo "activebox disabled";
                                    } else {
                                        echo "selection";
                                    } ?>" href="adminportal-users.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-users.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-users"></i>
                                </span>
                                <span>Manage Users</span>
                            </span>
                        </a>
                        <?php if ($url == 'adminportal-users.php' || $url == 'adminportal-users-adduser.php' || $url == 'adminportal-users-edituser.php') { ?>
                            <ul>
                                <li>
                                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-users-adduser.php') {
                                                    echo "activebox disabled";
                                                } else {
                                                    echo "selection";
                                                } ?>" href="adminportal-users-adduser.php">
                                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-users-adduser.php') {
                                                                    echo "activebox-font-color";
                                                                } ?>">
                                            <span class="icon">
                                                <i class="fas fa-user-plus"></i>
                                            </span>
                                            <span>Add New User</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
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

<?php include "footer.php" ?>