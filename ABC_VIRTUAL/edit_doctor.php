<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./signup.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body class="d-flex align-items-center py-4">

    <?php
    include 'connect_DB.php';

    if (isset($_POST['btn-submit'])) {
        $firstname = $_POST['txt-ua-firstname'];
        $lastname = $_POST['txt-ua-lastname'];
        $age = $_POST['txt-ua-age'];
        $gender = $_POST['txt-ua-gender'];
        $specialization = $_POST['txt-ua-special'];
        $email = $_POST['txt-ua-email'];
        $address = $_POST['txt-ua-address'];
        $contact = $_POST['txt-ua-contact'];
        $province = $_POST['txt-ua-province'];
        $district = $_POST['txt-ua-district'];
        $zip = $_POST['txt-ua-zip'];

        $users_u_ID = $_GET['users_u_ID'];

        $updateDoctorAccountsQuery = "UPDATE doctor_accounts SET
        da_firstname = '$firstname',
        da_lastname = '$lastname',
        da_age = $age,
        da_gender = '$gender',
        da_specialization = '$specialization',
        da_email = '$email',
        da_address = '$address',
        da_contact = '$contact',
        da_province = '$province',
        da_district = '$district',
        da_zip = '$zip'
        WHERE users_u_ID = $users_u_ID";

        $connection->query($updateDoctorAccountsQuery);

        $findDoctorIDQuery = "SELECT d_ID FROM doctors WHERE users_u_ID = $users_u_ID";
        $findDoctorIDResult = $connection->query($findDoctorIDQuery);

        if ($findDoctorIDResult->num_rows > 0) {
            $doctorIDRow = $findDoctorIDResult->fetch_assoc();
            $doctorID = $doctorIDRow['d_ID'];

            $updateDoctorQuery = "UPDATE doctors SET
            d_firstname = '$firstname',
            d_lastname = '$lastname',
            d_specialization = '$specialization',
            d_contact = '$contact'
            WHERE d_ID = $doctorID";

            $connection->query($updateDoctorQuery);
        }

        echo <<<HTML
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        myModal.show();
                        
                        setTimeout(function () {
                            myModal.hide();
                            window.location.href = "aa_d_view.php";
                        }, 2500);
                    });
                </script>
            HTML;
    }

    $users_u_ID = $_GET['users_u_ID'];
    $doctorDataQuery = "SELECT * FROM doctor_accounts WHERE users_u_ID = $users_u_ID";
    $doctorDataResult = $connection->query($doctorDataQuery);

    if ($doctorDataResult->num_rows > 0) {
        $row = $doctorDataResult->fetch_assoc();

        $firstname = $row['da_firstname'];
        $lastname = $row['da_lastname'];
        $age = $row['da_age'];
        $gender = $row['da_gender'];
        $specialization = $row['da_specialization'];
        $username = $row["da_username"];
        $email = $row['da_email'];
        $address = $row['da_address'];
        $contact = $row['da_contact'];
        $province = $row['da_province'];
        $district = $row['da_district'];
        $zip = $row['da_zip'];
    } else {
        echo "Doctor not found.";
    }

    $connection->close();
    ?>

    <div class="container d-flex align-items-center py-4">

        <form class="sign-up m-auto" method="POST">

            <img class="mb-3" src="./IMG_LOGO/LOGO.png">
            <h1 class="h3 mb-3 fw-normal">Edit Details (Doctor)</h1>

            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" value="<?php echo $firstname; ?>" required name="txt-ua-firstname">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastName" value="<?php echo $lastname; ?>" required name="txt-ua-lastname">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Age</label>
                    <input type="text" class="form-control" id="age" value="<?php echo $age; ?>" required name="txt-ua-age">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Gender</label>
                    <input type="text" class="form-control" id="age" value="<?php echo $gender; ?>" required name="txt-ua-gender">
                </div>

                <div class="col-12">
                    <label class="form-label">Specialization</label>
                    <input type="text" class="form-control" id="address" value="<?php echo $specialization; ?>" name="txt-ua-special">
                </div>

                <div class="col-12">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" disabled name="txt-ua-username">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="########" disabled name="txt-ua-password">
                </div>

                <div class="col-12">
                    <label class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="txt-ua-email">
                </div>

                <div class="col-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" value="<?php echo $address; ?>" name="txt-ua-address">
                </div>

                <div class="col-12">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact" value="<?php echo $contact; ?>" name="txt-ua-contact">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" value="<?php echo $province; ?>" name="txt-ua-province">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">District</label>
                    <input type="text" class="form-control" id="district" value="<?php echo $district; ?>" name="txt-ua-district">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Zip</label>
                    <input type="text" class="form-control" id="zip" value="<?php echo $zip; ?>" name="txt-ua-zip">
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-address" required>
                    <label class="form-check-label" for="same-address">Data Edited By Admin</label>
                </div>

                <hr class="my-4">

                <button class='btn w-100 abc-button' type='submit' name='btn-submit'>Confirm</button>

            </div>

            <p class="mt-5 mb-3 text-body-secondary">&copy; ABC™ - Made by
                <a href="https://github.com/Thili-126"><span>T</span>hilina R</a>
            </p>

        </form>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Modification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Data Edited Successfully.
                </div>
            </div>
        </div>
    </div>

</body>

</html>