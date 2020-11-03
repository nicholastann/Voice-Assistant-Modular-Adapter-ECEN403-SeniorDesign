<?php
    require '../appliances/appliances.php';

    $data_back = json_decode(file_get_contents('php://input'));
    $applianceId = $data_back->{"id"};

    $appliance = getapplianceById($applianceId);
    
    if (!$appliance) {
        include "partials/not_found.php";
        exit;
    }

    deleteappliance($applianceId);
?>