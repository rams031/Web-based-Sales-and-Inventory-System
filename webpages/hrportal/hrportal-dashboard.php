<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "headlinks.php" ?>
    
</head>

<body class="hrportal-dashboard">
    <nav class="navbar" role="navigation" aria-label="main navigation" >
    <?php include "topnavigation.php" ?>
    </nav>

    <div class="columns">
        <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        </div>

        <div class="column">

        </div>
    </div>

    <script src="../../api/jquery/dist/jquery.min.js"></script>

</body>

<script>
$(document).ready(function() {
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});
</script>

</html>