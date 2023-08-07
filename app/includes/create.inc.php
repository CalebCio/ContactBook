<?php

if(isset($_POST['create_contact'])) {

    
    //Grabbing the data
    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $group_id = $_POST['group_id'];


    //Instantiate Content Class
    include "../classes/database/dbh.classes.php";
    include "../classes/create.classes.php";
    include "../classes/controllers/create-contr.classes.php";

    $content = new CreateContr($fullname, $phonenumber, $email, $address, $gender, $group_id);

    //Running error handlers 
    $content->contactUser();

    //Going to next page
    header("location: ../../user/manageContact/index.php?error=none");

}

