<!DOCTYPE html>
<html style="background-image: linear-gradient(to right top, #2e495b, #294252, #253b49, #203440, #1c2d38);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "headlinks.php" ?>
</head>

<body class="login-portal" >
    <section class="section">
        <div class="card">
            <div class="card-content">
                <figure id="homepage-icon" class="image">
                    <img class=" is-centered" src="../assets/icon.PNG">
                </figure>
                <form>
                    <article class="message is-danger">
                        <div class="message-body">
                            The username or password you entered is <strong>incorrect</strong>.
                        </div>
                    </article>
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input id="username" name="username" class="input" type="text" placeholder="Username" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="userpassword" name="userpassword" class="input" type="password" placeholder="Password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input name="cookie" id="cookie" value="yes" type="checkbox">
                                <small> Remember me</small>
                            </label>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-right">
                        <p class="control">
                            <button class="button is-light" id="login" name="login" value="Sign in" type="submit">Sign in</button>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </section>
</body>

</html>
<?php include "footer.php" ?>
<?php include "scriptlinks.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
    $(document).ready(function() {
        $('.message').hide();
        $('form').on('submit', function(event) {
            event.preventDefault();
            console.log($('form').serialize())

            $.ajax({
                type: 'POST',
                url: '../phpaction/userlogin.php',
                data: $('form').serialize(),
                success: function(data) {
                    console.log(data)
                    if (data == "admin") {
                        $('#login').addClass("is-loading");
                        setTimeout(function() {
                            top.location.href = "./adminportal/adminportal-branch.php"
                        }, 2000);
                        
                    }
                    if (data == "sales") {
                        console.log("sales")
                        $('#login').addClass("is-loading");
                        setTimeout(function() {
                        top.location.href = "./salesportal/salesportal-dashboard.php"
                        }, 2000);
                    }
                    if (data == "error") {
                        $('.message').show(500);
                        $('#username').addClass("is-danger");
                        $('#userpassword').addClass("is-danger");
                        console.log(data)
                    }

                },
            });
        });
    });
</script>