<?php
    require '../appliances/appliances.php';

    if (!isset($_GET['id'])) {
        echo "error no appliance with that id first error";
        exit;
    }
    $applianceId = $_GET['id'];

    $appliance = getapplianceById($applianceId);
    if (!$appliance) {
        echo "error no appliance with that id";
        exit;
    }

    $errors = [
        'name' => "",
        'status' => ""
    ];

    $appliance = array_merge($appliance, $_POST);

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = updateappliance($_POST, $applianceId);
    }
?>