<?php
    session_start();
    $db = new PDO('mysql:host=us-cdbr-east-02.cleardb.com:3306;dbname=heroku_9cfa0e39f4cc915;charset=utf8mb4', 'b5cab6ba381e22', '032f36fc');
    $update = $db->prepare("UPDATE `appliances` SET `status` = ? WHERE `appliance_id` = ? LIMIT 1;");
    $update->execute([$status, $machine_id]);
?>
