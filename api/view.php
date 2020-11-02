<?php
require __DIR__ . '../appliances/appliances.php';

if (!isset($_GET['id'])) {
    include "../partials/not_found.php";
    exit;
}
$applianceId = $_GET['id'];

$appliance = getapplianceById($applianceId);
if (!$appliance) {
    include "../partials/not_found.php";
    exit;
}

?>
