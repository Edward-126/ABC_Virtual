<?php

session_start();

if (!isset($_SESSION['s_u_ID'])) {
    header("Location: login.php");
    exit();
}

include 'connect_DB.php';

$userID = $_SESSION['s_u_ID'];
$sqlReceptionID = "SELECT r_ID FROM receptionists WHERE users_u_ID = '$userID'";
$resultReceptionID = mysqli_query($connection, $sqlReceptionID);
$rowReceptionID = mysqli_fetch_assoc($resultReceptionID);
$receptionID = $rowReceptionID['r_ID'];

$l_date = $_POST['l_date'];
$l_reason = $_POST['l_reason'];

$sqlInsertLeave = "INSERT INTO r_leaves (l_date, l_reason, receptionists_r_ID) VALUES ('$l_date', '$l_reason', '$receptionID')";
$resultInsertLeave = mysqli_query($connection, $sqlInsertLeave);

$sqlCountLeaves = "SELECT COUNT(*) AS num_leaves FROM r_leaves WHERE receptionists_r_ID = '$receptionID'";
$resultCountLeaves = mysqli_query($connection, $sqlCountLeaves);
$rowCountLeaves = mysqli_fetch_assoc($resultCountLeaves);
$numLeaves = $rowCountLeaves['num_leaves'];

$_SESSION['num_leaves'] = $numLeaves;

mysqli_close($connection);

header("Location: index_log.php");
exit();
