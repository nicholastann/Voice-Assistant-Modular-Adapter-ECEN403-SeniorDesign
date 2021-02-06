<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';
include '_form.php'

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

        header("Location: index.php");
    }
}

?>