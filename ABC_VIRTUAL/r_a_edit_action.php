<?php

include 'connect_DB.php';

if (isset($_POST['btn-edit-submit'])) {
    $appointment_id = $_POST['appointment_id'];
    $new_appointment_date = $_POST['txt-edit-adate'];
    $new_reschedule_reason = $_POST['txt-edit-reason'];

    $update_query = "UPDATE r_appointments SET a_date = '$new_appointment_date', a_reschedule_reason = '$new_reschedule_reason' WHERE a_ID = $appointment_id";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        header("Location: index_log.php");
    } else {
        $message = "Error updating appointment record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
