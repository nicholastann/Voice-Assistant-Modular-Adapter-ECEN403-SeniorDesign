<?php
    require '../appliances/appliances.php';

    $data_back = json_decode(file_get_contents('php://input'));
    $applianceId = $data_back->{"id"};
    $applianceName = $data_back->{"name"};
    $applianceType = $data_back->{"type"};
    $applianceStatus = $data_back->{"status"};
    $applianceChannel = $data_back->{"channel"};
    $applianceVolume = $data_back->{"volume"};

    $appliance = [
        'id' => $applianceId,
        'name' => $applianceName,
        'type' => $applianceType
        'status' => $applianceStatus,
        'channel' => $applianceChannel,
        'volume' => $applianceVolume
    ];

    $errors = [
        'name' => "",
        'status' => "",
        'type' => "",
        'channel' => "",
        'volume' => ""
    ];

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) $appliance = createappliance($appliance);
?>


