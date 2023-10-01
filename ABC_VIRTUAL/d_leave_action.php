<?php

session_start();

if (!isset($_SESSION['s_u_ID'])) {
    header("Location: login.php");
    exit();
}

include 'connect_DB.php';

$userID = $_SESSION['s_u_ID'];
$sqlDoctorID = "SELECT d_ID FROM doctors WHERE users_u_ID = '$userID'";
$resultDoctorID = mysqli_query($connection, $sqlDoctorID);
$rowDoctorID = mysqli_fetch_assoc($resultDoctorID);
$doctorID = $rowDoctorID['d_ID'];

$l_date = $_POST['l_date'];
$l_reason = $_POST['l_reason'];

$sqlInsertLeave = "INSERT INTO d_leaves (l_date, l_reason, doctors_d_ID) VALUES ('$l_date', '$l_reason', '$doctorID')";
$resultInsertLeave = mysqli_query($connection, $sqlInsertLeave);

$sqlCountLeaves = "SELECT COUNT(*) AS num_leaves FROM d_leaves WHERE doctors_d_ID = '$doctorID'";
$resultCountLeaves = mysqli_query($connection, $sqlCountLeaves);
$rowCountLeaves = mysqli_fetch_assoc($resultCountLeaves);
$numLeaves = $rowCountLeaves['num_leaves'];

$_SESSION['num_leaves'] = $numLeaves;

mysqli_close($connection);

header("Location: d_home.php");
exit();
