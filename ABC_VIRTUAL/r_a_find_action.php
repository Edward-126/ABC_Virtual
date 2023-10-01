<?php

include 'connect_DB.php';

if (isset($_POST['btn-find-submit'])) {
    $P_FirstName = $_POST["txt-find-firstname"];
    $P_LastName = $_POST["txt-find-lastname"];
    $P_AppointmentDate = $_POST["txt-find-adate"];

    $query_appointment_id = "SELECT a_ID FROM r_appointments WHERE a_date = '$P_AppointmentDate' AND a_firstname = '$P_FirstName' AND a_lastname = '$P_LastName'";
    $result_appointment_id = mysqli_query($connection, $query_appointment_id);

    if ($result_appointment_id && mysqli_num_rows($result_appointment_id) > 0) {
        $row_appointment_id = mysqli_fetch_assoc($result_appointment_id);
        $appointment_id = $row_appointment_id['a_ID'];
        mysqli_close($connection);
        header("Location: r_a_edit.php?appointment_id=$appointment_id");
        exit();
    } else {
        $message = "No appointment found for the given details.";
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<!---------------------------------------------------------------->

<link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

<link rel="stylesheet" href="./a_create.css">
<link rel="stylesheet" href="./base.css">

<script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

<!---------------------------------------------------------------->


<body class="d-flex align-items-center py-4">
    <div class="container d-flex align-items-center py-4">
        <?php

        if (isset($message)) {
            echo "<p>$message</p>";
        }

        ?>
    </div>
</body>

</html>