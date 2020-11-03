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
    while (getapplianceByID($newID)["id"] > 0) {
        $newId = $newId + 1;
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
        if ($appliance['status'] != 0) {
            $isValid = false;
            $errors['status'] = 'Status must be 1 or 0';
        }
    }
    // End Of validation

    return $isValid;
}
