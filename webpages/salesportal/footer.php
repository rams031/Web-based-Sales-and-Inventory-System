<footer>
</footer>
<?php include "scriptlinks.php" ?>

<!-- footer ito -->
<script>
    $("#logout").click(function() {
        swal("Do you really want to log out?", {
            title: 'Are you sure?',
            dangerMode: true,
            cancel: true,
            buttons: true,
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((result) => {
            if (result == true) {
                window.location = "../../phpaction/logout.php"
            }
        })
    });
</script>