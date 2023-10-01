<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body class="d-flex align-items-center py-4">

    <div class="container">

        <main class="form-signin w-100 m-auto">

            <form class="login" action="login_action.php" method="post">

                <img class="mb-3" src="./IMG_LOGO/LOGO.png">
                <h1 class="h3 mb-3 fw-normal">Log in</h1>

                <div class="form-floating">
                    <input class="form-control" id="floatingInput" placeholder="name@example.com" type="text" name="txt-priv-name">
                    <label for="floatingInput">UserName</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" type="text" name="txt-priv-pw">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>

                <button class="btn w-100 py-2 abc-button" type="submit" name="btn-submit">Log in</button>

                <div class="form-link text-end my-3">
                    <a href="./signup.php">Sign-Up</a>
                </div>

                <p class="mt-5 mb-3 text-body-secondary">&copy; ABC™ - Made by
                    <a href="https://github.com/Thili-126"><span>T</span>hilina R</a>
                </p>

            </form>
        </main>

    </div>

</body>

</html>