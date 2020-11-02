<?php
require '../appliances/appliances.php';

if (!isset($_GET['id'])) {
    include "../partials/not_found.php";
    exit;
}
$applianceId = $_GET['id'];

$appliance = getapplianceById($applianceId);
echo json_encode($appliance);
if (!$appliance) {
    include "../partials/not_found.php";
    exit;
}

?>
