<aside id="sidenav" class="menu animate__animated animate__fadeIn">
    <div id="navbarBasicExample" class="navbar-menu is-shadowless" style="background-color: white;">
        <div id="list-type">

            <p class="menu-label employee-identification">
                Sales Employee </br>
                <strong>Ian Travis</strong>
            </p>

            <div class="list-view">

                <p class="menu-label">
                    General
                </p>

                <ul class="menu-list">
                    <li>
                        <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-dashboard.php') {
                                        echo "activebox disabled";
                                    } else {
                                        echo "selection";
                                    } ?>" href="salesportal-dashboard.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-dashboard.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon ">
                                    <i class="fas fa-tachometer-alt"></i>
                                </span>
                                <span>Dashboard</span>
                            </span>
                        </a>
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
                        <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-transaction.php') {
                                        echo "activebox disable";
                                    } else {
                                        echo "selection";
                                    } ?>" href="salesportal-transaction.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-transaction.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </span>
                                <span>Transactions</span>
                            </span>
                        </a>
                    </li>
                </ul>

                <p class="menu-label">
                    Inventory
                </p>
                <ul class="menu-list">
                    <li>
                        <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-branchstock.php') {
                                        echo "activebox disable";
                                    } else {
                                        echo "selection";
                                    } ?>" href="salesportal-branchstock.php">
                            <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'salesportal-branchstock.php') {
                                                        echo "activebox-font-color";
                                                    } ?>">
                                <span class="icon">
                                    <i class="fas fa-warehouse"></i>
                                </span>
                                <span>Branch Stock</span>
                            </span>
                        </a>
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