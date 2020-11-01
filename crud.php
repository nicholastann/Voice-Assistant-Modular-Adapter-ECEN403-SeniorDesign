<?php
    function getAppliances() {
        $users = json_decode(file_get_contents(filename: __DIR__. "/appliances.json"), assoc:true);
        echo "<pre>";
        var_dump($appliances);
        echo "</pre>";
        exit;
    }

    function getAppliancesByID() {

    }

    function createAppliance() {

    }

    function updateAppliance($data, $id) {

    }

    function deleteAppliance($id) {

    }

?>