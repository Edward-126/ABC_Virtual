<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment_View</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./a_view.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body>

    <?php

    include 'connect_DB.php';

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
                                <a class="nav-link nav-item-nav" aria-current="page" href="./index_log.html">HOME</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!---------------------------------------------------------------->

            <div class="container details-cont">

                <main>

                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal text-body-emphasis">Your Appointments</h1>
                        <p class="fs-5 text-body-secondary">Your Appointments Overview</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-appointments table-bordered align-middle">

                            <tbody>

                                <?php

                                session_start();
                                include 'connect_DB.php';

                                $monthNames = array(
                                    1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June',
                                    7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                                );

                                if (isset($_SESSION['s_u_ID'])) {

                                    $u_ID = $_SESSION['s_u_ID'];

                                    $sql = "SELECT a.a_ID, DAY(a.a_date) AS a_date, MONTH(a.a_date) AS a_month, YEAR(a.a_date) AS a_year, a.a_reason, CONCAT(p.p_firstname, ' ', p.p_lastname) AS p_name, CONCAT(d.d_firstname, ' ', d.d_lastname) AS d_name
                                    FROM appointments a
                                    INNER JOIN patients p ON a.patients_p_ID = p.p_ID
                                    INNER JOIN doctors d ON a.doctors_d_ID = d.d_ID
                                    WHERE p.users_u_ID = '$u_ID'
                                    ORDER BY a.a_date ASC";

                                    $result = mysqli_query($connection, $sql);

                                    if ($result) {

                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $month = $monthNames[$row["a_month"]];

                                            echo "
                
                            <tr>

                            <td class='table-data'>" . $row["a_date"] . " of " . $month . "  <br> <span class='card-text-date'> " . $row["a_year"] . "</td>

                            <td class='table-data'>" . $row["a_reason"] . " <br> Dr." . $row["d_name"] . "</td>
                    
    
                            <td class='table-data'>
                            <a href='a_edit.php?a_ID=$row[a_ID]'><button class='btn btn-primary abc-button'>Reschedule</button></a>
                            </td>

                            <td class='table-data'>
                            <a href='a_delete.php?a_ID=$row[a_ID]'><button class='btn btn-primary abc-button'>Remove</button></a>
                            </td>

                            </tr>
                            
                            ";
                                        }
                                    } else {
                                        echo "Error: " . mysqli_error($connection);
                                    }
                                } else {
                                    echo "User session not found.";
                                }
                                ?>

                            </tbody>

                        </table>

                    </div>

                    <div class="row">
                        <div class="col">
                            <a href="./index_log.html"><button class="btn w-100 abc-button">Home</button></a>
                        </div>
                        <div class="col">
                            <a href="./a_create.php"><button class="btn w-100 abc-button">Make An Appointment</button></a>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </div>

</body>

</html>