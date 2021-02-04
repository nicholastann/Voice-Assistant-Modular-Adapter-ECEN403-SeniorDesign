<?php
    require '../appliances/appliances.php';
    var axios = require("axios").default;

    $data_back = json_decode(file_get_contents('php://input'));
    $applianceId = $data_back->{"id"};
    $applianceName = $data_back->{"name"};
    $applianceStatus = $data_back->{"status"};
    $applianceChannel = $data_back->{"channel"};
    $applianceVolume = $data_back->{"volume"};

    $appliance = [
        'id' => $applianceId,
        'name' => $applianceName,
        'status' => $applianceStatus,
        'channel' => $applianceChannel,
        'volume' => $applianceVolume,
        'url' => $applianceUrl
    ];
    
    $errors = [
        'name' => "",
        'status' => "",
        'channel' => "",
        'volume' => "",
        'url' => ""
    ];
    
    $appliance = array_merge($appliance, $_POST);
    
    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = updateappliance($appliance, $applianceId);
        
        var options2 = {
            method: 'POST',
            url: '',
            headers: {'Content-Type': 'application/json'},
            data: json_encode($appliance);
        };
          
          axios.request(options2).then(function (response) { console.log(response.data); }).catch(function (error) {console.error(error); });
    }
    
?>
