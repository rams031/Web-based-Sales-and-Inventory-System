<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once "headlinks.php" ?>
</head>

<body class="login-portal">
    <section class="section">
        <div class="card">
            <div class="card-content">
                <figure id="homepage-icon" class="image">
                    <img class=" is-centered" src="../assets/icon.PNG">
                </figure>
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" placeholder="Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox">
                            <small> Remember me</small>
                        </label>
                    </div>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button ">
                            Login
                        </button>
                    </p>
                </div>
            </div>

        </div>
    </section>
</body>

</html>