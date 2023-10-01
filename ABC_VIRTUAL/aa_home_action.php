<?php

include 'connect_DB.php';

$doctorCountQuery = "SELECT COUNT(*) AS doctor_account_count FROM doctor_accounts";
$doctorResult = $connection->query($doctorCountQuery);
$doctorRow = $doctorResult->fetch_assoc();
$doctorCount = $doctorRow['doctor_account_count'];

$userCountQuery = "SELECT COUNT(*) AS user_account_count FROM user_accounts";
$userResult = $connection->query($userCountQuery);
$userRow = $userResult->fetch_assoc();
$userCount = $userRow['user_account_count'];

$receptionistCountQuery = "SELECT COUNT(*) AS receptionist_account_count FROM reception_accounts";
$receptionistResult = $connection->query($receptionistCountQuery);
$receptionistRow = $receptionistResult->fetch_assoc();
$receptionistCount = $receptionistRow['receptionist_account_count'];

$appointmentsCountQuery = "SELECT COUNT(*) AS appointments_count FROM appointments";
$appointmentsResult = $connection->query($appointmentsCountQuery);
$appointmentsRow = $appointmentsResult->fetch_assoc();
$appointmentsCount = $appointmentsRow['appointments_count'];

$patientsCountQuery = "SELECT COUNT(*) AS patients_count FROM patients";
$patientsResult = $connection->query($patientsCountQuery);
$patientsRow = $patientsResult->fetch_assoc();
$patientsCount = $patientsRow['patients_count'];

$usersCountQuery = "SELECT COUNT(*) AS users_count FROM users";
$usersResult = $connection->query($usersCountQuery);
$usersRow = $usersResult->fetch_assoc();
$usersCount = $usersRow['users_count'];

$doctorsCountQuery = "SELECT COUNT(*) AS doctors_count FROM doctors";
$doctorsResult = $connection->query($doctorsCountQuery);
$doctorsRow = $doctorsResult->fetch_assoc();
$doctorsCount = $doctorsRow['doctors_count'];

$receptionistsCountQuery = "SELECT COUNT(*) AS receptionists_count FROM receptionists";
$receptionistsResult = $connection->query($receptionistsCountQuery);
$receptionistsRow = $receptionistsResult->fetch_assoc();
$receptionistsCount = $receptionistsRow['receptionists_count'];

$dLeavesCountQuery = "SELECT COUNT(*) AS d_leaves_count FROM d_leaves";
$dLeavesResult = $connection->query($dLeavesCountQuery);
$dLeavesRow = $dLeavesResult->fetch_assoc();
$dLeavesCount = $dLeavesRow['d_leaves_count'];

$rLeavesCountQuery = "SELECT COUNT(*) AS r_leaves_count FROM r_leaves";
$rLeavesResult = $connection->query($rLeavesCountQuery);
$rLeavesRow = $rLeavesResult->fetch_assoc();
$rLeavesCount = $rLeavesRow['r_leaves_count'];

$rAppointmentsCountQuery = "SELECT COUNT(*) AS r_appointments_count FROM r_appointments";
$rAppointmentsResult = $connection->query($rAppointmentsCountQuery);
$rAppointmentsRow = $rAppointmentsResult->fetch_assoc();
$rAppointmentsCount = $rAppointmentsRow['r_appointments_count'];

$totalAppointmentsCount = $rAppointmentsCount + $appointmentsCount;

$totalLeavesCount = $dLeavesCount + $rLeavesCount;

$connection->close();
