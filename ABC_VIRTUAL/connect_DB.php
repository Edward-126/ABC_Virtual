<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>

<body>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "200302602587";
    $database = "abc_virtual";
    // $database = "abc_virtual_testing";

    $connection = mysqli_connect($servername, $username, $password, $database);

    if (!$connection) {
        die("Connection Failed : " . mysqli_connect_error());
    }
    ?>

</body>

</html>