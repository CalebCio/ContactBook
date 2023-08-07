<?php

if(isset($_POST['add_group'])) {

    //Grabbing the data
    $name = $_POST['name'];

    //Instantiate Content Class
    include "../classes/database/dbh.classes.php";
    include "../classes/createGroup.classes.php";
    include "../classes/controllers/createGroup-contr.classes.php";

    $content = new CreateGroupContr($name);

    //Running error handlers 
    $content->contactGroup();

    //Going to next page
    header("location: ../../user/manageGroup/index.php?error=none");

}
