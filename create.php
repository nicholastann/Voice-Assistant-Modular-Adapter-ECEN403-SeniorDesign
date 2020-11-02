<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';


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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appliance = array_merge($appliance, $_POST);

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = createappliance($_POST);

        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>

