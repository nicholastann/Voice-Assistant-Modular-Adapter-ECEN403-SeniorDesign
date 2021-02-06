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
        
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "",              //appliance url goes here
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => " { \n        \"name\": \"\",\n        \"id\": \"\",\n        \"volume\": \"\",\n        \"channel\": \"\",\n        \"url\": \"\"\n   }",
        CURLOPT_HTTPHEADER => [ //^fill in appliance info above
            "Content-Type: application/json"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err)  echo "cURL Error #:" . $err;
        else echo $response;
    }
    
?>
