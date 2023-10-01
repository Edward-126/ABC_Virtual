<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment_Delete</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./create_appointments_form.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body>

    <?php

    include 'connect_DB.php';

    $a_ID = $_GET['a_ID'];

    $sql = "DELETE FROM appointments WHERE a_ID = $a_ID";

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
    ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Removal Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Successfully Removed.
                </div>
            </div>
        </div>
    </div>
</body>

</html>