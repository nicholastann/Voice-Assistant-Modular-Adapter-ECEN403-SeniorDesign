<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';


$appliance = [
    'id' => '',
    'name' => '',
    'status' => '',
    'channel' => '',
    'volume' => '',
    'url' => ''
];

$errors = [
    'name' => "",
    'status' => "",
    'channel' => "",
    'volume' => "",
    'url' => ""
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

<?php include '_form.php' ?>

