<?php

function getappliances()
{
    return json_decode(file_get_contents(__DIR__ . '/appliances.json'), true);
}

function getapplianceById($id)
{
    $appliances = getappliances();
    foreach ($appliances as $appliance) {
        if ($appliance['id'] == $id) {
            return $appliance;
        }
    }
    return null;
}

function createappliance($data)
{
    $appliances = getappliances();

    $newId = 1;
    $applianceExist = getapplianceByID($newID);
    while ($applianceExist) {
        $newId = $newId + 1;
        $applianceExist = getapplianceByID($newID);
    }

    $data['id'] = $newID;
    $appliances[] = $data;

    putJson($appliances);

    return $data;
}

function updateappliance($data, $id)
{
    $updateappliance = [];
    $appliances = getappliances();
    foreach ($appliances as $i => $appliance) {

        if ($appliance['id'] == $id) {
            $appliances[$i] = $updateappliance = array_merge($appliance, $data);
        }
        
        $appliances[$i]['TestNumber'] = (int)$appliances[$i]['TestNumber'] + 1;
        $appliances[$i]['TestNumber'] = (string)$appliances[$i]['TestNumber'];
    }

    putJson($appliances);

    return $updateappliance;
}

function deleteappliance($id)
{
    $appliances = getappliances();

    foreach ($appliances as $i => $appliance) {
        if ($appliance['id'] == $id) {
            array_splice($appliances, $i, 1);
        }
    }

    putJson($appliances);
}

function putJson($appliances)
{
    file_put_contents(__DIR__ . '/appliances.json', json_encode($appliances, JSON_PRETTY_PRINT));
}

function validateappliance($appliance, &$errors)
{
    
    $isValid = true;

    //name validations
    if (!$appliance['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }

    //type validations
    if (!$appliance['type']) {
        $isValid = false;
        $errors['name'] = 'Type is mandatory';
    }

    //status validations
    if (!$appliance['status']) {
        $isValid = false;
        $errors['status'] = 'Status is mandatory';
    }
    if (filter_var($appliance['status'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>1))) === false) {
        $isValid = false;
        $errors['status'] = 'Status must be 1 or 0';
    }
    if ($appliance['status'] === 0 || $appliance['status'] === '0') {
        $isValid = true;
        $errors['status'] = '';
    } 

    //cv validations
    if ($appliance['type'] === "tv") {
        //channel validations
        if ($appliance['channel']) {
            if (filter_var($appliance['channel'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1, "max_range"=>1000))) === false) {
                $isValid = false;
                $errors['channel'] = 'Channel must be an integer between 1 and 1000';
            }
        }

        //volume validations
        if ($appliance['volume']) {
            if (filter_var($appliance['volume'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>100))) === false) {
                $isValid = false;
                $errors['volume'] = 'Volume must be an integer between 0 and 100';
            }
        }
    }
    else {
        if ($appliance['volume']) {
            $isValid = false;
            $errors['volume'] = 'Volume should be NULL';
        }
        if ($appliance['channel']) {
            $isValid = false;
            $errors['channel'] = 'Channel should be NULL';
        }
    }
    return $isValid;
}
