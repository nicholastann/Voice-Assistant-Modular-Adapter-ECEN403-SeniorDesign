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
    // Start of validation
    if (!$appliance['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }
    if (!$appliance['status']) {
        $isValid = false;
        $errors['status'] = 'Status is mandatory';
    }
    if (!is_numeric($appliance['status'])) {
        $isValid = false;
        $errors['status'] = 'Status must be 1 or 0';
    }
    if ((int)$appliance['status'] != '0') {
        if ((int)$appliance['status'] != '1') {
            $isValid = false;
            $errors['status'] = 'Status must be 1 or 0';
        }
    }

    if (!is_numeric($appliance['channel'])) {
        $isValid = false;
        $errors['channel'] = 'Channel must be an integer between 1 and 1000';
    }
    if ((int)$appliance['channel'] < 1) {
        $isValid = false;
        $errors['channel'] = 'Channel cannot be less than 1';
    }
    else if ((int)$appliance['channel'] > 10000) {
        $isValid = false;
        $errors['channel'] = 'Channel cannot be greater than 10000';
    }

    if (!is_numeric($appliance['volume'])) {
        $isValid = false;
        $errors['volume'] = 'Volume must be an integer between 0 and 100';
    }
    if ((int)$appliance['volume'] < 0) {
        $isValid = false;
        $errors['volume'] = 'Volume cannot be less than 0';
    }
    else if ((int)$appliance['volume'] > 100) {
        $isValid = false;
        $errors['volume'] = 'Volume cannot be greater than 100';
    }
    // End Of validation

    return $isValid;
}
