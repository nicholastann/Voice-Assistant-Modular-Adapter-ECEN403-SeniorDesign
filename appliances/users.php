<?php
/**
 * appliance: TheCodeholic
 * Date: 3/19/2019
 * Time: 9:27 AM
 */

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

    $data['id'] = rand(1000000, 2000000);

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
        $isValid = false;
        $errors['status'] = 'Status is mandatory';
    }
    // End Of validation

    return $isValid;
}
