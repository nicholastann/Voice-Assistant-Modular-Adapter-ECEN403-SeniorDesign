<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$applianceId = $_GET['id'];

$appliance = getapplianceById($applianceId);
if (!$appliance) {
    include "partials/not_found.php";
    exit;
}


$errors = [
    'name' => "",
    'status' => "",
    'type' => "",
    'channel' => "",
    'volume' => ""
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appliance = array_merge($appliance, $_POST);

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = updateappliance($_POST, $applianceId);
        $a = "Location: ";
        $b = ".php";
        $location = $a.$appliance['type'].$b;
        header($location);
    }
}

?>

<?php include 'u_form.php' ?>