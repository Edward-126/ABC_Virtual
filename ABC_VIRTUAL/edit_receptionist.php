<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Receptionist</title>

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

        $updateDoctorAccountsQuery = "UPDATE reception_accounts SET
        ra_firstname = '$firstname',
        ra_lastname = '$lastname',
        ra_age = $age,
        ra_gender = '$gender',
        ra_position = '$specialization',
        ra_email = '$email',
        ra_address = '$address',
        ra_contact = '$contact',
        ra_province = '$province',
        ra_district = '$district',
        ra_zip = '$zip'
        WHERE users_u_ID = $users_u_ID";

        $connection->query($updateDoctorAccountsQuery);

        $findDoctorIDQuery = "SELECT r_ID FROM receptionists WHERE users_u_ID = $users_u_ID";
        $findDoctorIDResult = $connection->query($findDoctorIDQuery);

        if ($findDoctorIDResult->num_rows > 0) {
            $doctorIDRow = $findDoctorIDResult->fetch_assoc();
            $doctorID = $doctorIDRow['r_ID'];

            $updateDoctorQuery = "UPDATE receptionists SET
            r_firstname = '$firstname',
            r_lastname = '$lastname',
            r_position = '$specialization',
            r_contact = '$contact'
            WHERE r_ID = $doctorID";

            $connection->query($updateDoctorQuery);
        }

        echo <<<HTML
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        myModal.show();
                        
                        setTimeout(function () {
                            myModal.hide();
                            window.location.href = "aa_r_view.php";
                        }, 2500);
                    });
                </script>
            HTML;
    }

    $users_u_ID = $_GET['users_u_ID'];
    $doctorDataQuery = "SELECT * FROM reception_accounts WHERE users_u_ID = $users_u_ID";
    $doctorDataResult = $connection->query($doctorDataQuery);

    if ($doctorDataResult->num_rows > 0) {
        $row = $doctorDataResult->fetch_assoc();
        $firstname = $row['ra_firstname'];
        $lastname = $row['ra_lastname'];
        $age = $row['ra_age'];
        $gender = $row['ra_gender'];
        $specialization = $row['ra_position'];
        $username = $row["ra_username"];
        $email = $row['ra_email'];
        $address = $row['ra_address'];
        $contact = $row['ra_contact'];
        $province = $row['ra_province'];
        $district = $row['ra_district'];
        $zip = $row['ra_zip'];
    } else {
        echo "Doctor not found.";
    }

    $connection->close();
    ?>

    <div class="container d-flex align-items-center py-4">

        <form class="sign-up m-auto" method="POST">

            <img class="mb-3" src="./IMG_LOGO/LOGO.png">
            <h1 class="h3 mb-3 fw-normal">Edit Details (Receptionist)</h1>

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