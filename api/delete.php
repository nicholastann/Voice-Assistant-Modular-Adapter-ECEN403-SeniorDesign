<?php
require '../appliances/appliances.php';


if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}
$applianceId = $_POST['id'];
$appliance = getapplianceById($applianceId);
if (!$appliance) {
    include "partials/not_found.php";
    exit;
}
deleteappliance($applianceId);
?>