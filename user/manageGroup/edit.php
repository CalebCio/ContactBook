<?php include("../../path.php"); 

if(!isset($_GET['idGroups'])) {
    header("location: ./index.php");
}


include ROOT_PATH . "/app/classes/database/dbh.classes.php";
include ROOT_PATH . "/app/classes/createGroup.classes.php";


$group = new CreateGroup();

$idGroup = intval($_GET['idGroups']);

$grp=$group->getSingle($idGroup);

if (empty($grp)) {
    header("location: ./index.php");
}

if (isset($_POST['editGroup'])) {
    $name=$_POST['name'];


    $results = $group->updateSingle($idGroup, $name);

    if($results) {
        echo '
        <script>
        alert("Update Successful");
        window.location.href="./index.php";
        </script>';
    } else {
        echo '<script>alert("An error occured")</scritp>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Group</title>

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
        
        <h2 class="text-center mt-3">Edit <?php echo $grp['name']?> Group</h2>

        <form action="" method="post">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Group Name:</label>
                <input type="text" class="form-control" id="name"  value="<?php echo $grp['name']?>" placeholder="Enter group name" name="name">
            </div>
            <button type="submit" name="editGroup" class="btn btn-secondary">Submit</button>
        </form>
    </div>
</div>
</div>

</section>

<!-- CDN LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>