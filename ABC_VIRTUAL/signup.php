<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

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

    ?>

    <?php

    if (isset($_POST['btn-submit'])) {

        $UA_firstname = $_POST["txt-ua-firstname"];
        $UA_lastname = $_POST["txt-ua-lastname"];
        $UA_age = $_POST["txt-ua-age"];
        $UA_gender = $_POST["txt-ua-gender"];
        $UA_username = $_POST["txt-ua-username"];
        $UA_password = $_POST["txt-ua-password"];
        $UA_email = $_POST["txt-ua-email"];
        $UA_contact = $_POST["txt-ua-contact"];
        $UA_address = $_POST["txt-ua-address"];
        $UA_province = $_POST["txt-ua-province"];
        $UA_district = $_POST["txt-ua-district"];
        $UA_zip = $_POST["txt-ua-zip"];

        $sql = "INSERT INTO users (u_name, u_username, u_password, u_role) 
        VALUES ('$UA_firstname', '$UA_username', '$UA_password', 'user')";

        if (mysqli_query($connection, $sql)) {
            $user_id = mysqli_insert_id($connection);

            $sql2 = "INSERT INTO user_accounts (ua_firstname, ua_lastname, ua_age, ua_gender, ua_username, ua_password, ua_email, ua_contact, ua_address, ua_province, ua_district, ua_zip, users_u_ID) 
            VALUES ('$UA_firstname', '$UA_lastname', '$UA_age', '$UA_gender', '$UA_username', '$UA_password', '$UA_email', '$UA_contact', '$UA_address', '$UA_province', '$UA_district', '$UA_zip', '$user_id')";

            if (mysqli_query($connection, $sql2)) {
                $sql3 = "INSERT INTO patients (p_firstname, p_lastname, p_age, p_gender, p_address, p_contact, users_u_ID) 
                    VALUES ('$UA_firstname', '$UA_lastname', '$UA_age', '$UA_gender', '$UA_address', '$UA_contact', '$user_id')";

                if (mysqli_query($connection, $sql3)) {
                    echo <<<HTML
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        myModal.show();
                        
                        setTimeout(function () {
                            myModal.hide();
                            window.location.href = "login.php";
                        }, 2500);
                    });
                </script>
            HTML;
                } else {
                    echo "error" . $sql3 . "<br>" . mysqli_error($connection);
                }
            } else {
                echo "error" . $sql2 . "<br>" . mysqli_error($connection);
            }
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($connection);
        }
    }

    ?>


    <div class="container d-flex align-items-center py-4">

        <form class="sign-up m-auto" method="POST">

            <img class="mb-3" src="./IMG_LOGO/LOGO.png">
            <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="txt-ua-firstname">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="txt-ua-lastname">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Age</label>
                    <input type="text" class="form-control" id="age" placeholder="20" value="" required name="txt-ua-age">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Gender</label>
                    <select class="form-select" aria-label="Default select example" name="txt-ua-gender">
                        <option selected>Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" placeholder="Username" required name="txt-ua-username">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="########" required name="txt-ua-password">
                </div>

                <div class="col-12">
                    <label class="form-label">Re-Enter Your Password</label>
                    <input type="password" class="form-control" id="email" placeholder="########" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" name="txt-ua-email">
                </div>

                <div class="col-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="txt-ua-address">
                </div>

                <div class="col-12">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact" placeholder="+10-001-001-001" name="txt-ua-contact">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" placeholder="" value="" name="txt-ua-province">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">District</label>
                    <input type="text" class="form-control" id="district" placeholder="" value="" name="txt-ua-district">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Zip</label>
                    <input type="text" class="form-control" id="zip" placeholder="" value="" name="txt-ua-zip">
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-address" required>
                    <label class="form-check-label" for="same-address">I agree to all terms and conditions</label>
                </div>

                <hr class="my-4">

                <button class='btn w-100 abc-button' type='submit' name='btn-submit'>Sign Up</button>

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Transfer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Data Successfully Added.
                </div>
            </div>
        </div>
    </div>

</body>

</html>