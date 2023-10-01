<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home_LOG</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./d_r_home.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>


<body>

    <?php

    session_start();

    if (!isset($_SESSION['s_u_ID'])) {
        header("Location: login.php");
        exit();
    }

    include 'connect_DB.php';

    $userID = $_SESSION['s_u_ID'];

    $sqlReceptionID = "SELECT r_ID FROM receptionists WHERE users_u_ID = '$userID'";
    $resultReceptionID = mysqli_query($connection, $sqlReceptionID);
    $rowReceptionID = mysqli_fetch_assoc($resultReceptionID);
    $receptionID = $rowReceptionID['r_ID'];

    $sqlAppointmentsCount = "SELECT COUNT(*) AS appointment_count FROM r_appointments WHERE receptionists_r_ID = '$receptionID'";
    $resultAppointmentsCount = mysqli_query($connection, $sqlAppointmentsCount);
    $rowAppointmentsCount = mysqli_fetch_assoc($resultAppointmentsCount);
    $numberOfAppointments = $rowAppointmentsCount['appointment_count'];

    $sqlRescheduledCount = "SELECT COUNT(*) AS rescheduled_count FROM r_appointments WHERE receptionists_r_ID = '$receptionID' AND a_reschedule_reason IS NOT NULL";
    $resultRescheduledCount = mysqli_query($connection, $sqlRescheduledCount);
    $rowRescheduledCount = mysqli_fetch_assoc($resultRescheduledCount);
    $numberOfRescheduledAppointments = $rowRescheduledCount['rescheduled_count'];

    $numLeaves = isset($_SESSION['num_leaves']) ? $_SESSION['num_leaves'] : 0;

    mysqli_close($connection);

    ?>

    <div id="home">

        <div class="container cover-head">
            <nav class="navbar navbar-expand-lg bg-body-transparent home-cont">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold" href="#">ABC™</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active nav-item-nav" aria-current="page" href="#">HOME</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item">
                                <a class="nav-link nav-item-nav" href="./aa_logout.php">SIGNOUT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!---------------------------------------------------------------->

            <div class="container details-cont">

                <main>

                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal text-body-emphasis">Reception Dashboard</h1>
                        <p class="fs-5 text-body-secondary">Welcome, valued receptionists, to the ABC Hospital Reception Dashboard – Your partner for seamless patient reception. Effortlessly manage check-ins, appointments, and inquiries with ease. Elevate the front desk experience with the ABC Hospital Reception Dashboard. </p>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Appointments</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><?php echo $numberOfAppointments; ?><small class="text-body-secondary fw-light">/Appointments Made</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Created appointments</li>
                                        <li>Total of <?php echo $numberOfAppointments; ?> appointments were made</li>
                                    </ul>

                                    <a href="r_a_create.php"><button type="button" class="w-100 btn btn-lg  abc-button">Make an Appointment</button></a>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Reschedule</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><?php echo $numberOfRescheduledAppointments; ?><small class="text-body-secondary fw-light">/Rescheduled</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Rescheduled Appointments</li>
                                        <li>Total of <?php echo $numberOfRescheduledAppointments; ?> appointments were Rescheduled</li>
                                    </ul>

                                    <a href="r_a_find.php">
                                        <button type="button" class="w-100 btn btn-lg abc-button">Reschedule</button></a>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 text-center justify-content-center">
                        <div class="col-6">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Leave</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><?php echo $numLeaves; ?><small class="text-body-secondary fw-light">/Leaves</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Apply for a Leave here</li>
                                        <li>Total of <?php echo $numLeaves; ?> were taken this month</li>
                                    </ul>

                                    <a href="r_leave.php">
                                        <button type="button" class="w-100 btn btn-lg abc-button">Apply</button></a>

                                </div>
                            </div>
                        </div>
                    </div>

                </main>

            </div>

        </div>

    </div>

</body>

</html>