<?php
    require '../appliances/appliances.php';

    $data_back = json_decode(file_get_contents('php://input'));
    $applianceId = $data_back->{"id"};
    $applianceName = $data_back->{"name"};
    $applianceType = $data_back->{"type"};
    $applianceStatus = $data_back->{"status"};
    $applianceChannel = $data_back->{"channel"};
    $applianceVolume = $data_back->{"volume"};
    $applianceTestNumber = $data_back->{"TestNumber"};

    $appliance = [
        'id' => $applianceId,
        'name' => $applianceName,
        'type' => $applianceType,
        'status' => $applianceStatus,
        'channel' => $applianceChannel,
        'volume' => $applianceVolume,
        'TestNumber' => $applianceTestNumber
    ];
    
    $errors = [
        'name' => "",
        'status' => "",
        'type' => "",
        'channel' => "",
        'volume' => "",
        'TestNumber' => ""
    ];
    
    $appliance = array_merge($appliance, $_POST);
    
    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = updateappliance($appliance, $applianceId);
    }
    
?>
