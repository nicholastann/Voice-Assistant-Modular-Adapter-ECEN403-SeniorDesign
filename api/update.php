<?php
    require '../appliances/appliances.php';

    $data_back = json_decode(file_get_contents('php://input'));
    $applianceId = $data_back->{"id"};
    $applianceName = $data_back->{"name"};
    $applianceStatus = $data_back->{"status"};
    $applianceChannel = $data_back->{"channel"};
    $applianceVolume = $data_back->{"volume"};
    $applianceUrl = $data_back->{"url"};

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
        $appliance = updateappliance($_POST, $applianceId);

        //The url you wish to send the POST request to
        $url = $applianceUrl;

        //The data you want to send via POST
        $fields = json_encode($appliance);

        //url-ify the data for the POST
        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);
        echo $result;
    }
    
?>
