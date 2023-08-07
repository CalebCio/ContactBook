<?php

function validateGroup($group) {

    $errors = array();

    if(empty($group['name'])) {
        array_push($errors, 'Name is required');
    }


    $existingGroup = selectOne('groups', ['name' => $group['name']]);
    if($existingGroup) {

        if (isset($group['editGroup']) && $existingGroup['idGroups'] != $group['idGroups']) {
            array_push($errors, 'Name already exists');
        }
        
        if (isset($group['add__group'])) {
            array_push($errors, 'Name already exists');
        }
    }

    return $errors;
}
