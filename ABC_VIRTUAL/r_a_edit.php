<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./r_a_create.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body class="d-flex align-items-center py-4">

    <div class="container align-items-center py-4">

        <form class="sign-up m-auto" method="POST" action="r_a_edit_action.php">

            <img class="mb-3" src="./IMG_LOGO/LOGO.png">
            <h1 class="h3 mb-3 fw-normal">Edit the Appointment</h1>

            <div class="row g-3">

                <?php

                include 'connect_DB.php';

                if (isset($_GET['appointment_id'])) {
                    $appointment_id = $_GET['appointment_id'];
                    $query_appointment = "SELECT * FROM r_appointments WHERE a_ID = $appointment_id";
                    $result_appointment = mysqli_query($connection, $query_appointment);

                    if ($result_appointment && mysqli_num_rows($result_appointment) > 0) {
                        $appointment = mysqli_fetch_assoc($result_appointment);
                        $appointment_date = $appointment['a_date'];
                        $reschedule_reason = $appointment['a_reschedule_reason'];

                        echo <<<HTML

                        

                            <div class="col-sm-12">
                                <label class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" required name="txt-edit-adate" value="$appointment_date">
                            </div>

                            <div class="col">
                                <label class="form-label">Reschedule Reason</label>
                                <textarea type="text"  class="form-control" name="txt-edit-reason" value="$reschedule_reason" cols="30" rows="5"></textarea>
                            </div>
         
                            <input type="hidden" name="appointment_id" value="$appointment_id">
                
                    HTML;
                    }
                }
                ?>

            </div>

            <br>

            <hr class="my-4">

            <button class="btn w-100 abc-button" type="submit" name="btn-edit-submit">Save Changes</button>

            <p class="mt-5 mb-3 text-body-secondary">&copy; ABC™ - Made by
                <a href="https://github.com/Thili-126"><span>T</span>hilina R</a>
            </p>



        </form>
    </div>
</body>

</html>