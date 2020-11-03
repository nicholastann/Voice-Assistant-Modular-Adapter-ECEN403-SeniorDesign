<?php
    require '../appliances/appliances.php';

    $applianceId = $_GET['id'];

    $appliance = getapplianceById($applianceId);
    echo json_encode($appliance);

?>
