<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$applianceId = $_GET['id'];

$appliance = getapplianceById($applianceId);
if (!$appliance) {
    include "partials/not_found.php";
    exit;
}

$errors = [
    'name' => "",
    'status' => "",
    'channel' => "",
    'volume' => "",
    'url' => ""
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appliance = array_merge($appliance, $_POST);

    $isValid = validateappliance($appliance, $errors);

    if ($isValid) {
        $appliance = updateappliance($_POST, $applianceId);

        var options2 = {
            method: 'POST',
            url: '',
            headers: {'Content-Type': 'application/json'},
            data: json_encode($appliance);
        };
          
        axios.request(options2).then(function (response) { console.log(response.data); }).catch(function (error) {console.error(error); });

        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>
