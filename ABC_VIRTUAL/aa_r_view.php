<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aa_d_view</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./aa_d_view.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body>

    <?php

    include 'connect_DB.php';

    $receptionAccountsQuery = "SELECT * FROM reception_accounts";
    $receptionAccountsResult = $connection->query($receptionAccountsQuery);

    $connection->close();

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
                                <a class="nav-link nav-item-nav" aria-current="page" href="./aa_home.php">DASHBOARD</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!---------------------------------------------------------------->

            <div class="container details-cont">

                <main>

                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal text-body-emphasis">Receptionists Overview</h1>
                        <p class="fs-5 text-body-secondary">Meet our friendly receptionists who play a crucial role in ensuring a seamless and welcoming experience for all our patients. They are here to assist you and make your visit as smooth as possible. Learn more about our receptionists and the valuable support they provide in your healthcare journey.</p>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">

                        <?php

                        while ($row = $receptionAccountsResult->fetch_assoc()) {
                            echo <<<HTML

                            <div class="col">

                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header">
                                        <h4 class="my-0 fw-normal">{$row['ra_position']}</h4>
                                    </div>

                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title"><small class="text-body-secondary fw-light">Mr. </small>{$row['ra_firstname']} {$row['ra_lastname']}
                                        </h1>
                                        <ul class="list-unstyled mt-3 mb-1">
                                            <li>Age:<b> {$row['ra_age']}</b></li>
                                            <li>Gender: <b>{$row['ra_gender']}</b></li>
                                            <li>Contact: <b>{$row['ra_contact']}</b></li>
                                        </ul>

                                    <a href='edit_receptionist.php?users_u_ID={$row['users_u_ID']}'><button type="button" class="btn abc-button w-100 my-2 ">Edit Details</button></a>
                                        
                                    </div>
                                </div>

                            </div>


                            HTML;
                        }
                        ?>


                    </div>
            </div>

            </main>

        </div>

    </div>

    </div>

</body>

</html>