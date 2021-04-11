<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';


if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}
$applianceId = $_POST['id'];
deleteappliance($applianceId);

$a = "Location: ";
$b = ".php";
$location = $a.$appliance['type'].$b;
header($location);
