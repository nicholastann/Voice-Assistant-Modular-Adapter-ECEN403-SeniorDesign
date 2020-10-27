<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=testing;charset=utf8mb4', 'root', '');
$sel_status = $db->prepare("SELECT `status` FROM `info` WHERE `id` = ? LIMIT 1;");
$sel_status->execute([$_GET['id']]);
$status = $sel_status->fetch()['status'];//1 or 0
$_SESSION['status'] = $status;
echo ($status) ? 'checked' : '';