<?php

function validateContact($contact) {

    $errors = array();

    if(empty($contact['fullname'])) {
        array_push($errors, 'Fullname is required');
        $errors = false;
    }

    if(empty($contact['number'])) {
        array_push($errors, 'Phone number is required');
        $errors = false;
    }

    if(empty($contact['email'])) {
        array_push($errors, 'Email is required');
        $errors = false;
    }

    if(empty($contact['address'])) {
        array_push($errors, 'Address is required');
        $errors = false;
    }

    if(empty($contact['gender'])) {
        array_push($errors, 'Gender is required');
        $errors = false;
    }

    if(empty($contact['group_id'])) {
        array_push($errors, 'Please select a group');
        $errors = false;
    }

    return $errors;
}