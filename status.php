<?php
session_start();
$db = new PDO('mysql:host=us-cdbr-east-02.cleardb.com:3306;dbname=heroku_9cfa0e39f4cc915;charset=utf8mb4', 'b5cab6ba381e22', '032f36fc');
$sel_status = $db->prepare("SELECT `status` FROM `appliances` WHERE `appliance_id` = ? LIMIT 1;");
$sel_status->execute([$_GET['appliance_id']]);
$status = $sel_status->fetch()['status'];//1 or 0
$_SESSION['status'] = $status;
echo ($status) ? 'checked' : '';