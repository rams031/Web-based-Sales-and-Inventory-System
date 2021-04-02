<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "headlinks.php" ?>

</head>

<body class="adminportal-users-adduser">
    <nav class="navbar" role="navigation" aria-label="main navigation" style="width: 100%;">
        <?php include "topnavigation.php" ?>
    </nav>

    <div class="columns">
        <div id="sidenavcustom" class="column is-narrow navigationbar">
            <?php include "sidenavigation.php" ?>
        </div>

        <div class="column is-10 ">
            <div class="rows card animate__animated animate__fadeInDown">
                <div class="row is-full">
                    <div class="columns">
                        <div class="column">
                            <span class="icon">
                                <i class="fas fa-user-plus fa-2x"></i>
                            </span>
                            <span class="portal-font is-size-4 has-text-left">Add New Users</span>
                        </div>
                        <div class="column">

                        </div>
                    </div>
                </div>

                <div class="row is-full">
                    <div class="columns ">
                        <div class="column">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include "scriptlinks.php" ?>
</body>

<script type="text/javascript">
    $('.display').DataTable();
</script>

<script>
    $(document).ready(function() {
        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });
</script>

</html>