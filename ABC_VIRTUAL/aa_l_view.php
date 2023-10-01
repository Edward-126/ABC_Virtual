<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aa_l_view</title>

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

    $sqlRLeavesWithReceptionistNames = "
    SELECT r.*, re.r_firstname, re.r_lastname, re.r_position
    FROM r_leaves r
    INNER JOIN receptionists re ON r.receptionists_r_ID = re.r_ID
    ORDER BY r.l_date ASC
    ";
    $resultRLeavesWithReceptionistNames = mysqli_query($connection, $sqlRLeavesWithReceptionistNames);

    $sqlDLeavesWithDoctorNames = "
    SELECT d.*, do.d_firstname, do.d_lastname, do.d_specialization
    FROM d_leaves d
    INNER JOIN doctors do ON d.doctors_d_ID = do.d_ID
    ORDER BY d.l_date ASC
    ";
    $resultDLeavesWithDoctorNames = mysqli_query($connection, $sqlDLeavesWithDoctorNames);

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
                        <h1 class="display-4 fw-normal text-body-emphasis">Staff Leaves Overview</h1>
                        <p class="fs-5 text-body-secondary">Welcome to the Staff Leave Management Dashboard. Here, you have complete control over staff members' leave requests and schedules. Access leave details, employee information, leave history, and more, all conveniently in one place. Efficiently coordinate and ensure the smooth management of staff leaves, contributing to the operational excellence of our healthcare practice. Your role in maintaining our practice's high standards starts here.</p>
                    </div>

                    <div class="table-responsive">

                        <h2>Doctors Leaves</h2><br>

                        <table class="table table-appointments table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                while ($row = mysqli_fetch_assoc($resultDLeavesWithDoctorNames)) {
                                    echo "<tr>";

                                    echo "<td>" . $row['l_date'] . "</td>";
                                    echo "<td>" . $row['d_firstname'] . " " . $row['d_lastname'] . "</td>";
                                    echo "<td>" . $row['d_specialization'] . "</td>";
                                    echo "<td>" . $row['l_reason'] . "</td>";
                                    echo "</tr>";
                                }

                                ?>

                            </tbody>
                        </table>

                        <hr>

                        <br>
                        <h2>Receptionists Leaves</h2><br>

                        <table class="table table-appointments table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                while ($row = mysqli_fetch_assoc($resultRLeavesWithReceptionistNames)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['l_date'] . "</td>";
                                    echo "<td>" . $row['r_firstname'] . " " . $row['r_lastname'] . "</td>";
                                    echo "<td>" . $row['r_position'] . "</td>";
                                    echo "<td>" . $row['l_reason'] . "</td>";
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