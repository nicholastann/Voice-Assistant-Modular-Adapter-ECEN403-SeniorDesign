<?php

require_once __DIR__ . "/config.php";

class API {
    function Select() {
        $db = new Connect();
        $users = array();
        $data = $db->prepare("SELECT * FROM appliances ORDER BY appliance_id");
        $data -> execute();
        while($OutputData = $data -> fetch(PDO::FETCH_ASSOC)){
            $users[$OutputData['id']] = array(
                "id" => $OutputData["id"],
                "status" => $OutputData["status"],
                "edit_date" => $OutputData["edit_date"]
            );
        }
        return json_encode($users);
    }
}

$API = new API;
header("content-Type: application/json");
echo $API ->Select();
?>