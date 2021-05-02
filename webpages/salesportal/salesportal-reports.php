<?php include "header.php" ?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- REPORTS-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">


            <div class="row is-full">
                <span class="icon">
                    <i class="fas fa-file-alt fa-2x"></i>
                </span>
                <span class="portal-font is-size-4">Request Stock</span>
            </div>
            <div class="row is-full">
                dito magcocode
                <!-- d2 kanalang mag code -->
            </div>



        </div>
    </div>
</div>

<?php include "footer.php" ?>

<script>
    $(document).ready(function() {
        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });
</script>