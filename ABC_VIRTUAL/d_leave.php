<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave_Doc</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./d_leave.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body class="d-flex align-items-center py-4">

    <div class="container align-items-center py-4">

        <form class="sign-up m-auto" action="d_leave_action.php" method="post">

            <img class="mb-3" src="./IMG_LOGO/LOGO.png">
            <h1 class="h3 mb-3 fw-normal">Apply for a Leave</h1>

            <div class="row g-3">

                <div class="col-sm-12">

                    <label for="l_date" class="form-label">Leave Date</label>
                    <input type="date" class="form-control" id="l_date" name="l_date" required>

                </div>

                <div class="col-sm-12">

                    <label for="l_reason" class="form-label">Reason:</label>
                    <textarea type="text" class="form-control" id="l_reason" name="l_reason" required cols="30" rows="5"></textarea>

                </div>
            </div>

            <br>

            <hr class="my-4">

            <button class="btn w-100 abc-button" type="submit" value="Submit">Apply for the Leave</button>

            <p class="mt-5 mb-3 text-body-secondary">&copy; ABC™ - Made by
                <a href="https://github.com/Thili-126"><span>T</span>hilina R</a>
            </p>

        </form>

</body>

</html>