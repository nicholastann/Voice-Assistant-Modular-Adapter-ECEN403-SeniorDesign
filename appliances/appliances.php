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
        if ((int)$appliance['status'] != '0') {
            if ((int)$appliance['status'] != '1') {
                $isValid = false;
                $errors['status'] = 'Status must be 1 or 0';
            }
        }
    }
    if (!(int)$appliance['channel']) {
        if ((int)$appliance['channel'] < 1) {
            $isValid = false;
            $errors['channel'] = 'channel cannot be less than 1';
        }
        else if ((int)$appliance['channel'] > 10000) {
            $isValid = false;
            $errors['channel'] = 'channel cannot be greater than 10000';
        }
    }
    if (!(int)$appliance['volume']) {
        if ((int)$appliance['volume'] < 0) {
            $isValid = false;
            $errors['volume'] = 'volume cannot be less than 0';
        }
        else if ((int)$appliance['volume'] > 100) {
            $isValid = false;
            $errors['volume'] = 'volume cannot be greater than 100';
        }
    }
    // End Of validation

    return $isValid;
}
