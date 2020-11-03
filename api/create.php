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

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) $appliance = createappliance($appliance);
?>


