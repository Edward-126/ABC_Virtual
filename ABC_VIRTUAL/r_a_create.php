<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R_Appointment_Make</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./r_a_create.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body class="d-flex align-items-center py-4">

    <?php

    session_start();

    if (!isset($_SESSION['s_u_ID'])) {
        header('Location: login.php');
        exit;
    }

    include 'connect_DB.php';

    $userID = $_SESSION['s_u_ID'];

    $sqlReceptionID = "SELECT r_ID FROM receptionists WHERE users_u_ID = '$userID'";
    $resultReceptionID = mysqli_query($connection, $sqlReceptionID);
    $rowReceptionID = mysqli_fetch_assoc($resultReceptionID);
    $receptionID = $rowReceptionID['r_ID'];

    $query_specializations = "SELECT DISTINCT d_specialization FROM doctors";

    $doctor_specializations = array();
    $result_specializations = mysqli_query($connection, $query_specializations);
    while ($row_specialization = mysqli_fetch_assoc($result_specializations)) {
        $doctor_specializations[] = $row_specialization['d_specialization'];
    }

    $selected_specialization = isset($_POST['doctor_specialization']) ? $_POST['doctor_specialization'] : '';
    $selected_doctors = array();

    if (!empty($selected_specialization)) {
        $query_doctors = "SELECT d_firstname, d_lastname FROM doctors WHERE d_specialization = '$selected_specialization'";
        $result_doctors = mysqli_query($connection, $query_doctors);
        while ($row_doctor = mysqli_fetch_assoc($result_doctors)) {
            $selected_doctors[] = $row_doctor['d_firstname'] . ' ' . $row_doctor['d_lastname'];
        }
    }

    ?>

    <div class="container d-flex align-items-center py-4">

        <form class="sign-up m-auto" method="POST">

            <img class="mb-3" src="./IMG_LOGO/LOGO.png">
            <h1 class="h3 mb-3 fw-normal">Make An Appointment</h1>

            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="First Name" required name="txt-a-firstname">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Last Name" required name="txt-a-lastname">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Specialization</label>
                    <select class="form-select" name="doctor_specialization">

                        <?php foreach ($doctor_specializations as $specialization) : ?>
                            <option value="<?php echo $specialization; ?>" <?php if ($selected_specialization === $specialization) echo 'selected'; ?>>
                                <?php echo $specialization; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Doctor</label>
                    <input type="text" class="form-control" id="doctor" placeholder="Dr." name="txt-a-doctorname">
                    <div class="form-text">Leave blank if you don't know the doctor's name</div>
                </div>
            </div>

            <div class="col">
                <label class="form-label">Appointment Date</label>
                <input type="date" class="form-control" id="username" required name="txt-a-adate">
            </div>

            <div class="col-sm-12">
                <label class="form-label">Reason</label>
                <textarea class="form-control" name="txt-a-reason" id="reason" cols="30" rows="5"></textarea>
            </div>
            <br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="same-address" required>
                <label class="form-check-label" for="same-address">I agree to all terms and conditions</label>
            </div>

            <hr class="my-4">

            <button class="btn w-100 abc-button" type="submit" name="btn-submit">Book Now</button>

            <p class="mt-5 mb-3 text-body-secondary">&copy; ABC™ - Made by
                <a href="https://github.com/Thili-126"><span>T</span>hilina R</a>
            </p>

    </div>

    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Transfer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Data Successfully Added.
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php

    if (isset($_POST['btn-submit'])) {
        $P_FirstName = $_POST["txt-a-firstname"];
        $P_LastName = $_POST["txt-a-lastname"];
        $P_Specialization = $_POST["doctor_specialization"];
        $P_DoctorName = $_POST["txt-a-doctorname"];
        $P_AppointmentDate = $_POST["txt-a-adate"];
        $P_Reason = $_POST["txt-a-reason"];

        $query_doctor_id = "SELECT d_ID FROM doctors WHERE d_specialization = '$P_Specialization'";
        $result_doctor_id = mysqli_query($connection, $query_doctor_id);

        if ($result_doctor_id) {
            $row_doctor_id = mysqli_fetch_assoc($result_doctor_id);
            $doctor_id = $row_doctor_id['d_ID'];
        } else {
            echo "Error: " . mysqli_error($connection);
        }

        $sql = "INSERT INTO r_appointments (a_firstname, a_lastname, a_date, a_reason, receptionists_r_ID, doctors_d_ID) VALUES ('$P_FirstName',
            '$P_LastName','$P_AppointmentDate', '$P_Reason', $receptionID, $doctor_id)";

        if (mysqli_query($connection, $sql)) {

            echo <<<HTML
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        myModal.show();
                        
                        setTimeout(function () {
                            myModal.hide();
                            window.location.href = "a_view.php";
                        }, 2500);
                    });
                </script>
            HTML;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }

    ?>

</body>

</html>