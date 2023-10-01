<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aa_a_view</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./aa_p_view.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body>

    <?php

    include 'connect_DB.php';

    $monthNames = array(
        1 => 'January ', 2 => 'February ', 3 => 'March ', 4 => 'April ', 5 => 'May ', 6 => 'June ',
        7 => 'July ', 8 => 'August ', 9 => 'September ', 10 => 'October ', 11 => 'November ', 12 => 'December '
    );

    $appointmentsQuery = "SELECT * FROM appointments";
    $appointmentsResult = $connection->query($appointmentsQuery);

    $rAppointmentsQuery = "SELECT * FROM r_appointments";
    $rAppointmentsResult = $connection->query($rAppointmentsQuery);

    $sqlAppointmentsWithPatientsAndDoctors = "
    SELECT a.a_ID, DAY(a.a_date) AS a_date, MONTH(a.a_date) AS a_month, YEAR(a.a_date) AS a_year, a.a_reason, a.a_reschedule_reason, p.p_firstname, p.p_lastname, d.d_ID, CONCAT(d.d_firstname, ' ', d.d_lastname) AS d_name
    FROM appointments a
    INNER JOIN patients p ON a.patients_p_ID = p.p_ID
    INNER JOIN doctors d ON a.doctors_d_ID = d.d_ID
    ORDER BY a_month ASC
    ";

    $resultAppointmentsWithPatientsAndDoctors = mysqli_query($connection, $sqlAppointmentsWithPatientsAndDoctors);

    $sqlRecAppointmentsWithPatientsAndDoctors = "
    SELECT ra.a_ID, DAY(ra.a_date) AS a_date, MONTH(ra.a_date) AS a_month, YEAR(ra.a_date) AS a_year, ra.a_reason, ra.a_reschedule_reason, ra.a_firstname, ra.a_lastname, d.d_firstname, d.d_lastname
    FROM r_appointments ra
    LEFT JOIN doctors d ON ra.doctors_d_ID = d.d_ID
    ORDER BY a_month ASC
    ";
    $resultRecAppointmentsWithPatientsAndDoctors = mysqli_query($connection, $sqlRecAppointmentsWithPatientsAndDoctors);

    $connection->close();

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
                                <a class="nav-link nav-item-nav" aria-current="page" href="./aa_home.php">DASHBOARD</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!---------------------------------------------------------------->

            <div class="container details-cont">

                <main>

                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal text-body-emphasis">Appointments Overview</h1>
                        <p class="fs-5 text-body-secondary">Welcome to the Appointments Management Dashboard. Here, you have complete control over scheduling and managing appointments. Access appointment details, patient information, scheduling history, and more, all conveniently in one place. Efficiently coordinate and ensure the smooth scheduling of appointments, contributing to the highest level of service for our patients. Your role in maintaining our healthcare practice's excellence starts here.</p>
                    </div>

                    <div class="table-responsive">

                        <h2>Appointments via Website</h2><br>

                        <table class="table table-appointments table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Appointment Reason</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                while ($row = mysqli_fetch_assoc($resultAppointmentsWithPatientsAndDoctors)) {

                                    $month =
                                        $monthNames[$row["a_month"]];

                                    echo "<tr>";
                                    echo "<td>" . $row["a_date"] . " of " . $month .  $row["a_year"] . "</td>";
                                    echo "<td>" . $row['p_firstname'] . " " . $row['p_lastname'] . "</td>";
                                    echo "<td>" . $row['d_name'] . "</td>";
                                    echo "<td>" . $row['a_reason'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <hr>

                        <br>
                        <h2>Appointments via Reception</h2><br>

                        <table class="table table-appointments table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Appointment Reason</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                while ($row = mysqli_fetch_assoc($resultRecAppointmentsWithPatientsAndDoctors)) {

                                    $month =
                                        $monthNames[$row["a_month"]];

                                    echo "<tr>";
                                    echo "<td>" . $row["a_date"] . " of " . $month .  $row["a_year"] . "</td>";
                                    echo "<td>" . $row['a_firstname'] . " " . $row['a_lastname'] . "</td>";
                                    echo "<td>" . $row['d_firstname'] . " " . $row['d_lastname'] . "</td>";
                                    echo "<td>" . $row['a_reason'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>

                </main>

            </div>

            </main>

        </div>

    </div>

</body>

</html>