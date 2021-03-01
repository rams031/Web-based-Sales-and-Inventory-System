<?php $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
      $urlshort = "localhost/pos/webpages/hrportal/";
      $hostactive;

      if($host == ''. $urlshort .'hrportal-dashboard.php') 
      { $hostactive = 'Dashboard';}
      else if ($host == ''. $urlshort .'hrportal-checkout.php')
      { $hostactive = 'Checkout';}
      ?>
?>

<aside id="sidenav" class="menu">
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

                <li class="<?php if ($hostactive != 'Dashboard') { echo "selection"; }  ?>">
                    <a class="<?php if ($hostactive == 'Dashboard') { echo "activebox disable"; } else { echo "selection"; } ?>" href="hrportal-dashboard.php">
                        <span class="icon-text">
                            <span class="icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span>Dashboard</span>
                        </span>
                    </a>
                </li>

                <p class="menu-label">
                    Sales
                </p>

                <li class="<?php if ($hostactive != 'Checkout') { echo "selection"; }  ?>">
                    <a class="<?php if ($hostactive == 'Checkout') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-checkout.php">
                        <span class="icon-text">
                            <span class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            <span>Check out</span>
                        </span>
                    </a>
                </li>

                <li class="Transactions" >
                    <a href="">
                        <span class="icon-text">
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

                <li class="Branchstock" >
                    <a class="is-active" href="">
                        <span class="icon-text">
                            <span class="icon">
                                <i class="fas fa-warehouse"></i>
                            </span>
                            <span>Branch Stock</span>
                        </span>
                    </a>
                </li>

                <li class="Requeststock" >
                    <a href="">
                        <span class="icon-text">
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

                <li class="Reports" >
                    <a href="">
                        <span class="icon-text">
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