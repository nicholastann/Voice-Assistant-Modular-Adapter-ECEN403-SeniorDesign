<?php
    require '../appliances/appliances.php';

    $data_back = json_decode(file_get_contents('php://input'));
    $applianceId = $data_back->{"id"};
    $applianceName = $data_back->{"name"};
    $applianceStatus = $data_back->{"status"};
    $applianceChannel = $data_back->{"channel"};
    $applianceVolume = $data_back->{"volume"};

    $appliance = [
        'id' => $applianceId,
        'name' => $applianceName,
        'status' => $applianceStatus
        'channel' => $applianceChannel
        'volume' => $applianceVolume
    ];
    
    $errors = [
        'name' => "",
        'status' => "",
        'channel' => "",
        'volume' => ""
    ];
    
    $appliance = array_merge($appliance, $_POST);
    
    $isValid = validateappliance($appliance, $errors);

    if ($isValid) $appliance = updateappliance($appliance, $applianceId);
    
?>
