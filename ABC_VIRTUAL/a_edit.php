<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment_Edit</title>


    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./a_create.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body class="d-flex align-items-center py-4">
    <div class="container w-100 m-auto">

        <?php

        include 'connect_DB.php';

        ?>

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['a_ID'])) {
                $appointment_id = $_GET['a_ID'];

                $query = "SELECT a.a_ID, a.a_date, a.a_reason, CONCAT(p.p_firstname, ' ', p.p_lastname) AS p_name
                          FROM appointments a
                          INNER JOIN patients p ON a.patients_p_ID = p.p_ID
                          WHERE a.a_ID = $appointment_id";

                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query failed: " . mysqli_error($connection));
                }

                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    echo "

                    <div class='container py-4 w-100 m-auto'>

                        <form class='sign-up m-auto' method='post' action='a_edit_action.php'>
                    
                        <h1 class='h2 mb-3 fw-500'>Reschedule Appointment</h1>
                        
                        <div class='row g-3'>
                            <div class='col-sm-6'>
                                <label class='form-label'>Patient Name</label>
                                <input class='form-control' type='text' name='new_date' placeholder=" . $row['p_name'] . " disabled>
                            </div>

                            <div class='col-sm-6'>
                                <label class='form-label'>Appointment Date</label>
                                <input class='form-control' type='text' name='new_date' placeholder=" . $row['a_date'] . " disabled>
                
                            </div>

                            <div class='col-sm-6'>
                                <label class='form-label'>Reason</label>
                                <input class='form-control' type='text' name='new_date' placeholder=" . $row['a_reason'] . " disabled>
                            </div>

                            <input type='hidden' name='appointment_id' value='$appointment_id'> 

                            <div class='col-sm-6'>
                                <label class='form-label'>New Appointment Date</label>
                                <input class='form-control' type='date' name='new_date' required>
                            </div>

                            <div class='col'>
                                <label class='form-label'>Reason for Rescheduling</label>
                                <textarea class='form-control' name='reschedule_reason'></textarea>
                            </div>

                        </div>

                        <div class='form-check text-start my-3'>
                            <input class='form-check-input' type='checkbox' value='remember-me' id='flexCheckDefault'>
                            <label class='form-check-label' for='flexCheckDefault'>
                                Confirm Reschedule
                            </label>
                        </div>

                        <hr class='my-4'>

                        <button class='btn w-100 abc-button' type='submit' name='btn-submit'>Confirm</button>
                    
                        <p class='mt-5 mb-3 text-body-secondary'>&copy; ABC™ - Made by
                             <a href='https://github.com/Thili-126'><span>T</span>hilina R</a>
                        </p>            

                    </form>

                    </div>

                    ";
                } else {
                    echo "Appointment not found.";
                }
            } else {
                echo "Appointment ID not provided.";
            }
        }
        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reschedule Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Reschedule Successful.
                    </div>
                </div>
            </div>
        </div>

    </div>



</body>

</html>