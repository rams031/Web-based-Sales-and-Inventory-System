<aside id="sidenav" class="menu animate__animated animate__fadeIn">
    <div id="navbarBasicExample" class="navbar-menu is-shadowless" style="background-color: #F2F2F2;">
        <div id="list-type">

            <p class="menu-label employee-identification" >
                Sales Employee </br>
                <strong>Ian Travis</strong>
            </p>

            <div class="is-divider"></div>

            <div class="list-view">

                <p class="menu-label">
                    General
                </p>

                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-dashboard.php') { echo "activebox disabled"; } else { echo "selection"; } ?>" href="hrportal-dashboard.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-dashboard.php') { echo "activebox-font-color"; }?>" >
                            <span class="icon ">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span>Dashboard</span>
                        </span>
                    </a>
                </li>

                <p class="menu-label">
                    Sales
                </p>

                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-checkout.php') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-checkout.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-checkout.php') { echo "activebox-font-color"; }?>">
                            <span class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            <span>Check out</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-transaction.php') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-transaction.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-transaction.php') { echo "activebox-font-color"; }?>">
                            <span class="icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </span>
                            <span>Transactions</span>
                        </span>
                    </a>
                </li>

                <p class="menu-label">
                    Inventory
                </p>

                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-branchstock.php') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-branchstock.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-branchstock.php') { echo "activebox-font-color"; }?>">
                            <span class="icon">
                                <i class="fas fa-warehouse"></i>
                            </span>
                            <span>Branch Stock</span>
                        </span>
                    </a>
                </li>

                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-requeststock.php') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-requeststock.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-requeststock.php') { echo "activebox-font-color"; }?>">
                            <span class="icon">
                                <i class="fas fa-boxes"></i>
                            </span>
                            <span>Request Stock</span>
                        </span>
                    </a>
                </li>

                <p class="menu-label">
                    Documents
                </p>

                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-reports.php') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-reports.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'hrportal-reports.php') { echo "activebox-font-color"; }?>">
                            <span class="icon">
                                <i class="fas fa-file-alt"></i>
                            </span>
                            <span>Reports</span>
                        </span>
                    </a>
                </li>
            </div>

            <div class="is-divider"></div>

            <div class="list-view">
                <li style="list-style-type:none;">
                    <a href="">
                        <span class="icon-text">
                            <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span>Log Out</span>
                        </span>
                    </a>
                </li>
            </div>
        </div>
    </div>
</aside>