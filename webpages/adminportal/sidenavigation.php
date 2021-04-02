
<aside id="sidenav" class="menu animate__animated animate__fadeIn__faster">
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

                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-inventory.php') { echo "activebox disabled"; } else { echo "selection"; } ?>" href="adminportal-inventory.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-inventory.php') { echo "activebox-font-color"; }?>" >
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

                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-users.php') { echo "activebox disabled"; } else { echo "selection"; } ?>" href="adminportal-users.php">
                        <span class="icon-text <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-users.php') { echo "activebox-font-color"; }?>" >
                            <span class="icon">
                                <i class="fas fa-users"></i>
                            </span>
                            <span>Manage Users</span> 
                        </span>
                    </a>
                </li>

                <?php if (basename($_SERVER['PHP_SELF']) == 'adminportal-users-adduser.php') { ?> 
                    <li>
                    <a class="sidenav-droplist activebox disabled" href="adminportal-users-adduser.php">
                        <span class="icon-text activebox-font-color" >
                            <span class="icon">
                                <i class="fas fa-user-plus"></i>
                            </span>
                            <span>Add New User</span> 
                        </span>
                    </a>
                </li>
                <?php } ?>

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