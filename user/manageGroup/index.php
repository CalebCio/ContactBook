<?php 

include("../../path.php"); 
include ROOT_PATH . "/app/classes/database/dbh.classes.php";
include ROOT_PATH . "/app/classes/createGroup.classes.php";



$group = new CreateGroup();
$table=$group->getTable();

if (isset($_POST['deleteGroup'])) {

    $idGroup=$_POST['idGroup'];

    $results = $group->deleteSingle($idGroup);


    if($results) {

        echo '

        <script>

        alert("Delete Successful");

        window.location.href="../../user/manageGroup/index.php";

        </script>';

    } else {

        echo '

        <script>

        alert("There are contacts associated with this group, please remove the contacts from this group to be able to delete it");

        window.location.href="../../user/manageGroup/index.php";

        </script>';
    }
}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Groups</title>

    <!-- CDN LINK -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- ICONS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Linking Css file  -->

    <link rel="stylesheet" href="../../assets/CSS/styles.css">

    

</head>

<body>


    <!-- Left Side Bar Starts-->

    <?php

    include ROOT_PATH . "/app/includes/sidebar.php";

    ?>

    <!-- Left Side Bar Ends -->


    <div class="col-sm-9 p-3">

        <div class="d-flex justify-content-around">

            <a href="create.php" class="btn btn-secondary">Add Group</a>
            <a href="index.php" class="btn btn-secondary">Manage Groups</a>

        </div>

        <h2 class="text-center mt-3">Groups</h2>

        <table class="table caption-top">

            <caption>List of Groups</caption>

            <thead>

                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contacts</th>
                    <th scope="col">Actions</th>
                </tr>

            </thead>
            
            <tbody>

                <?php

                if (!empty($table)) {

                    $counter=1;

                    foreach($table as $list) {

                        ?>



                        <tr>
                            <td><?php echo $counter++; ?> </td>
                            <td><?php echo $list['name']; ?></td>
                            <td><?php echo $group->getCountGroup($list['idGroups'])?></td>
                            <td class="d-flex gap-3"><a class="btn btn-primary text-white" href="edit.php?idGroups=<?php echo $list['idGroups'];?>" class="edit">Edit</a>

                                <?php 
                                //Show delete button if a group does not have contacts
                                if ($group->getCountGroup($list['idGroups']) < 1): ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="idGroup" value=<?php echo $list['idGroups']?>>
                                        <input class="btn btn-danger" type="submit" name="deleteGroup" class="delete" onclick="return confirm(`Are you sure you want to delete group <?php echo $list["name"]?>`)" value='Delete'>
                                    </form> 
                                <?php endif ?>
                            </td>

                        </tr>

                        <?php
                    }

                } 
                else { 
                    ?>
                    <tr>
                        <td colspan="8">No data found</td>
                    </tr>
                <?php } ?>  
            </tbody>
        </table>

    </div>
</div>
</div>

</section>



<!-- CDN LINK -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



</body>

</html>