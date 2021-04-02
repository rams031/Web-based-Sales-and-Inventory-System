<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "headlinks.php" ?>

</head>

<body class="adminportal-users">
    <nav class="navbar" role="navigation" aria-label="main navigation" style="width: 100%;">
        <?php include "topnavigation.php" ?>
    </nav>

    <div class="columns">

        <div id="sidenavcustom" class="column is-narrow navigationbar">
            <?php include "sidenavigation.php" ?>
        </div>

        <div class="column is-10">
            <div class="rows card animate__animated animate__fadeInDown">
                <div class="row is-full">
                    <div class="columns">
                        <div class="column is-11">
                            <span class="icon">
                                <i class="fas fa-user fa-2x"></i>
                            </span>
                            <span class="portal-font is-size-4">Manage Users</span>
                        </div>
                        <div class="column">
                            <div class="buttons">
                                <a class="button is-light is-size-6" href="adminportal-users-adduser.php">Add New User</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row is-full">
                    <div class="columns">
                        <div class="column is-12">
                            <table class="display">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Row 1 Data 1</td>
                                        <td>dghdfhdfh</td>
                                    </tr>
                                    <tr>
                                        <td>yuiyuiyui</td>
                                        <td>dfgdfg</td>
                                    </tr>
                                </tbody>
                            </table>
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