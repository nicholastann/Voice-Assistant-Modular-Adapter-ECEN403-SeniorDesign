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

$applianceUrl = $appliance['url'];

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

        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>