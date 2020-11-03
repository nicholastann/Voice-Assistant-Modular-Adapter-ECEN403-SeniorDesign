<?php
    require '../appliances/appliances.php';

    $data_back = json_decode(file_get_contents('php://input'));
    $applianceId = $data_back->{"id"};
    $applianceName = $data_back->{"name"};
    $applianceStatus = $data_back->{"status"};

    $appliance = [
        'id' => $applianceId,
        'name' => $applianceName,
        'status' => $applianceStatus
    ];

    $errors = [
        'name' => "",
        'status' => ""
    ];

    $appliance = array_merge($appliance, $_POST);

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) $appliance = createappliance($_POST);
?>


