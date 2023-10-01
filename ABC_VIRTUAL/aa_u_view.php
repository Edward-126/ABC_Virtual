<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aa_u_view</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./aa_p_view.css">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body>

    <?php

    include 'connect_DB.php';

    $usersQuery = "SELECT * FROM users";
    $usersResult = $connection->query($usersQuery);

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
                        <h1 class="display-4 fw-normal text-body-emphasis">Users Overview</h1>
                        <p class="fs-5 text-body-secondary">Welcome to the User Management Dashboard. Here, you have complete control over user profiles and interactions. Access user details, roles, permissions, and more, all conveniently in one place. Efficiently manage and coordinate user accounts, ensuring a smooth experience across our platform. Your role in maintaining the excellence of our services begins here.</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-appointments table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                while ($row = $usersResult->fetch_assoc()) {

                                    echo "<tr>";

                                    echo "<td class='table-data'>" . $row['u_name'] . "</td>";
                                    echo "<td class='table-data'>" . $row['u_username'] . "</td>";
                                    echo "<td class='table-data'>" . $row['u_role'] . "</td>";

                                    echo "</tr>";
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>

                </main>

            </div>

            </main>

        </div>

    </div>

</body>

</html>