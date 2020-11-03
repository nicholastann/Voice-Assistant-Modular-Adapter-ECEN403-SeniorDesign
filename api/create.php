<?php
    require '../appliances/appliances.php';

    $appliance = [
        'id' => '',
        'name' => '',
        'status' => ''
    ];

    $errors = [
        'name' => "",
        'status' => ""
    ];
    $isValid = true;

    $appliance = array_merge($appliance, $_POST);

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = createappliance($_POST);
    }
?>

