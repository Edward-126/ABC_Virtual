<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D_R_Appointment_View</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./d_a_view.css">
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

    $monthNames = array(
        1 => 'January ', 2 => 'February ', 3 => 'March ', 4 => 'April ', 5 => 'May ', 6 => 'June ',
        7 => 'July ', 8 => 'August ', 9 => 'September ', 10 => 'October ', 11 => 'November ', 12 => 'December '
    );

    $userID = $_SESSION['s_u_ID'];

    $sqlDoctorID = "SELECT d_ID FROM doctors WHERE users_u_ID = '$userID'";
    $resultDoctorID = mysqli_query($connection, $sqlDoctorID);
    $rowDoctorID = mysqli_fetch_assoc($resultDoctorID);
    $doctorID = $rowDoctorID['d_ID'];

    $sqlRescheduledAppointments = "
    SELECT a.a_ID, DAY(a.a_date) AS a_date, MONTH(a.a_date) AS a_month, YEAR(a.a_date) AS a_year, a.a_reason, a.a_reschedule_reason, p.p_firstname, p.p_lastname
    FROM appointments a
    INNER JOIN patients p ON a.patients_p_ID = p.p_ID
    WHERE a.doctors_d_ID = '$doctorID' AND a.a_reschedule_reason IS NOT NULL
    ORDER BY a_month ASC

";
    $resultRescheduledAppointments = mysqli_query($connection, $sqlRescheduledAppointments);

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
                                <a class="nav-link nav-item-nav" aria-current="page" href="./d_home.php">HOME</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!---------------------------------------------------------------->

            <div class="container details-cont">

                <main>

                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal text-body-emphasis">Rescheduled Appointments</h1>
                        <p class="fs-5 text-body-secondary">Your Rescheduled Appointments Overview</p>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-appointments table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Patient Name</th>
                                    <th>Reschedule Reason</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                while ($row = mysqli_fetch_assoc($resultRescheduledAppointments)) {

                                    $month = $monthNames[$row["a_month"]];

                                    echo "<tr>";
                                    echo "<td>" . $row["a_date"] . " of " . $month .  $row["a_year"] . "</td>";
                                    echo "<td>" . $row['p_firstname'] . " " . $row['p_lastname'] . "</td>";
                                    echo "<td>" . $row['a_reschedule_reason'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>

                </main>
            </div>
        </div>

</body>

</html>