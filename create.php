<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';


$appliance = [
    'id' => '',
    'name' => '',
    'type' => '',
    'status' => '',
    'channel' => '',
    'volume' => '',
    'TestNumber' => ''
];

$errors = [
    'name' => "",
    'status' => "",
    'type' => "",
    'channel' => "",
    'volume' => "",
    'TestNumber' => ""
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appliance = array_merge($appliance, $_POST);

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = createappliance($appliance);

        header("Location: index.php");
    }
}

?>

<?php include 'c_form.php' ?>

