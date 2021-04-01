<?php $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
      $urlshort = "localhost/Web-based-Sales-and-Inventory-System/webpages/hrportal/";
      $hostactive;

      if($host == $urlshort ."hrportal-dashboard.php") 
      { $hostactive = 'Dashboard';}
      else if ($host == ''. $urlshort .'hrportal-checkout.php')
      { $hostactive = 'Checkout';}
      else if ($host == ''. $urlshort .'hrportal-transaction.php')
      { $hostactive = 'Transaction';}
      if($host == ''. $urlshort .'hrportal-branchstock.php') 
      { $hostactive = 'Branchstock';}
      else if ($host == ''. $urlshort .'hrportal-reports.php')
      { $hostactive = 'Reports';}
      else if ($host == ''. $urlshort .'hrportal-requeststock.php')
      { $hostactive = 'Requeststock';}
?>


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

                <li class="<?php if ($hostactive != 'Dashboard') { echo "selection"; } else { echo "activebox disabled"; } ?>">
                    <a class="<?php if ($hostactive == 'Dashboard') { echo "activebox disabled"; } else { echo "selection"; } ?>" href="hrportal-dashboard.php">
                        <span class="icon-text <?php if ($hostactive == 'Dashboard') { echo "activebox-font-color"; }?>" >
                            <span class="icon ">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span>Dashboard </span>
                        </span>
                    </a>
                </li>

                <p class="menu-label">
                    Sales
                </p>

                <li class="<?php if ($hostactive != 'Checkout') { echo "selection"; }  ?>">
                    <a class="<?php if ($hostactive == 'Checkout') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-checkout.php">
                        <span class="icon-text <?php if ($hostactive == 'Checkout') { echo "activebox-font-color"; }?>">
                            <span class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            <span>Check out</span>
                        </span>
                    </a>
                </li>
                <li class="<?php if ($hostactive != 'Transaction') { echo "selection"; }  ?>">
                    <a class="<?php if ($hostactive == 'Transaction') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-transaction.php">
                        <span class="icon-text <?php if ($hostactive == 'Transaction') { echo "activebox-font-color"; }?>">
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

                <li class="<?php if ($hostactive != 'Branchstock') { echo "selection"; }  ?>">
                    <a class="<?php if ($hostactive == 'Branchstock') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-branchstock.php">
                        <span class="icon-text <?php if ($hostactive == 'Branchstock') { echo "activebox-font-color"; }?>">
                            <span class="icon">
                                <i class="fas fa-warehouse"></i>
                            </span>
                            <span>Branch Stock</span>
                        </span>
                    </a>
                </li>

                <li class="<?php if ($hostactive != 'Requeststock') { echo "selection"; }  ?>">
                    <a class="<?php if ($hostactive == 'Requeststock') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-requeststock.php">
                        <span class="icon-text <?php if ($hostactive == 'Requeststock') { echo "activebox-font-color"; }?>">
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

                <li class="<?php if ($hostactive != 'Reports') { echo "selection"; }  ?>">
                    <a class="<?php if ($hostactive == 'Reports') { echo "activebox disable"; } else { echo "selection"; } ?>"href="hrportal-reports.php">
                        <span class="icon-text <?php if ($hostactive == 'Reports') { echo "activebox-font-color"; }?>">
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