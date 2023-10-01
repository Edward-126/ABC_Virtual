<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Appointment</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./r_a_create.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body class="d-flex align-items-center py-4">

    <div class="container align-items-center py-4">

        <form class="sign-up m-auto" method="POST" action="r_a_find_action.php">

            <img class="mb-3" src="./IMG_LOGO/LOGO.png">
            <h1 class="h3 mb-3 fw-normal">Find the Appointment</h1>

            <div class="row g-3">

                <div class="col-sm-6">
                    <label class="form-label">First name</label>
                    <input type="text" class="form-control" placeholder="First Name" required name="txt-find-firstname">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Last name</label>
                    <input type="text" class="form-control" placeholder="Last Name" required name="txt-find-lastname">
                </div>

                <div class="col">
                    <label class="form-label">Appointment Date</label>
                    <input type="date" class="form-control" required name="txt-find-adate">
                </div>

            </div>

            <br>

            <hr class="my-4">

            <button class="btn w-100 abc-button" type="submit" name="btn-find-submit">Find the Appointment</button>

            <p class="mt-5 mb-3 text-body-secondary">&copy; ABC™ - Made by
                <a href="https://github.com/Thili-126"><span>T</span>hilina R</a>
            </p>

        </form>
    </div>
</body>

</html>