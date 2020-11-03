<?php
    require '../appliances/appliances.php';
    
    $appliances = getappliances();
    echo json_encode($appliances);
?>