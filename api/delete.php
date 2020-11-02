<?php
require '../appliances/appliances.php';


if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}
$applianceId = $_POST['id'];
deleteappliance($applianceId);
