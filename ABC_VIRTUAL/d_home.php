<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D_Home</title>

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

    $sqlDoctorID = "SELECT d_ID FROM doctors WHERE users_u_ID = '$userID'";
    $resultDoctorID = mysqli_query($connection, $sqlDoctorID);
    $rowDoctorID = mysqli_fetch_assoc($resultDoctorID);
    $doctorID = $rowDoctorID['d_ID'];

    $sqlAppointmentsCount = "SELECT COUNT(*) AS appointment_count FROM appointments WHERE doctors_d_ID = '$doctorID'";
    $resultAppointmentsCount = mysqli_query($connection, $sqlAppointmentsCount);
    $rowAppointmentsCount = mysqli_fetch_assoc($resultAppointmentsCount);
    $numberOfAppointments = $rowAppointmentsCount['appointment_count'];

    $sqlRescheduledCount = "SELECT COUNT(*) AS rescheduled_count FROM appointments WHERE doctors_d_ID = '$doctorID' AND a_reschedule_reason IS NOT NULL";
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
                            <!-- <li class="nav-item">
                                <a class="nav-link nav-item-nav" href="#services">SERVICES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-item-nav" href="#about">ABOUT</a>
                            </li> -->
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
                        <h1 class="display-4 fw-normal text-body-emphasis">Doctor Dashboard</h1>
                        <p class="fs-5 text-body-secondary">Welcome, doctors, to the ABC Hospital Dashboard –
                            Your hub for efficient patient management. Stay organized with
                            a clear view of appointments, patient profiles, and medical data. </p>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Appointments</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><?php echo $numberOfAppointments; ?><small class="text-body-secondary fw-light">/Appointments</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Appointments overview</li>
                                        <li>Total of <?php echo $numberOfAppointments; ?> appointments available</li>
                                    </ul>

                                    <a href="d_a_view.php"><button type="button" class="w-100 btn btn-lg  abc-button">View All Appointments</button></a>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Rescheduled</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><?php echo $numberOfRescheduledAppointments; ?><small class="text-body-secondary fw-light">/Appointments</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Rescheduled Appointments overview</li>
                                        <li>Total of <?php echo $numberOfRescheduledAppointments; ?> appointments were Rescheduled</li>
                                    </ul>

                                    <a href="d_a_r_view.php">
                                        <button type="button" class="w-100 btn btn-lg abc-button">View Rescheduled Appointments</button></a>

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

                                    <a href="d_leave.php">
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