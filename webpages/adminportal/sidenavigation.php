<?php $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
      $urlshort = "localhost/Web-based-Sales-and-Inventory-System/webpages/adminportal/";
      $hostactive;

      if($host == ''. $urlshort .'adminportal-inventory.php') 
      { $hostactive = 'Inventory';}
      else if ($host == ''. $urlshort .'adminportal-dashboard.php')
      { $hostactive = 'Dashboard';}
      else if ($host == ''. $urlshort .'adminportal-users.php')
      { $hostactive = 'Users';}
      if($host == ''. $urlshort .'') 
      { $hostactive = '';}
      else if ($host == ''. $urlshort .'')
      { $hostactive = '';}
      else if ($host == ''. $urlshort .'')
      { $hostactive = '';}
?>


<aside id="sidenav" class="menu animate__animated animate__fadeIn">
    <div id="navbarBasicExample" class="navbar-menu is-shadowless" style="background-color: #F2F2F2;">
        <div id="list-type">

            <p class="menu-label employee-identification" >
                Administrator </br>
                <strong>Christopher John</strong>
            </p>

            <div class="is-divider"></div>

            <div class="list-view">

                <p class="menu-label">
                    General
                </p>

                <li class="<?php if ($hostactive != 'Inventory') { echo "selection"; } else { echo "activebox disabled"; } ?>">
                    <a class="<?php if ($hostactive == 'Inventory') { echo "activebox disabled"; } else { echo "selection"; } ?>" href="adminportal-inventory.php">
                        <span class="icon-text <?php if ($hostactive == 'Inventory') { echo "activebox-font-color"; }?>" >
                            <span class="icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span> Manage Inventory</span>
                        </span>
                    </a>
                </li>

                
                <p class="menu-label">
                    Users
                </p>

                <li class="<?php if ($hostactive != 'Users') { echo "selection"; } else { echo "activebox disabled"; } ?>">
                    <a class="<?php if ($hostactive == 'Users') { echo "activebox disabled"; } else { echo "selection"; } ?>" href="adminportal-users.php">
                        <span class="icon-text <?php if ($hostactive == 'Users') { echo "activebox-font-color"; }?>" >
                            <span class="icon">
                                <i class="fas fa-users"></i>
                            </span>
                            <span>Manage Users</span> 
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