<?php include("../../path.php");

include ROOT_PATH . "/app/classes/database/dbh.classes.php";
include ROOT_PATH . "/app/classes/createGroup.classes.php";

$group = new CreateGroup();
$table=$group->getTable();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Contacts</title>


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
        <a href="create.php" class="btn btn-secondary">Add Contact</a>
        <a href="index.php" class="btn btn-secondary">Manage Contacts</a>
    </div>

    <h2 class="text-center mt-3">Add Contact</h2>

    <form action="<?php echo BASE_URL . "/app/includes/create.inc.php"; ?>" method="post">

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Full Name:</label>
            <input type="text" class="form-control" value="" id="Fullname" placeholder="Enter Fullname" name="fullname">
        </div>

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Phone Number:</label>
            <input type="number" class="form-control" value="" id="number" placeholder="Enter Phone number" name="phonenumber">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" value="" id="email" placeholder="Enter email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" value="" placeholder="Enter Address" name="address">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Gender:</label>
            <input type="text" class="form-control" id="gender" value="" placeholder="Enter Gender" name="gender">
        </div>

        <div class="mb-3">
            <label class="form-label">Group</label>
            <select name="group_id" class="form-select mt-3">
                <option value="0" >Uncategorized</option>
                <?php foreach ($table as $key => $list): ?>
                    <?php if (!empty($group_id) && $group_id == $list['idGroups']): ?>
                        <option selected value="<?php echo $list['idGroups']; ?>"><?php echo $list['name']; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $list['idGroups']; ?>"><?php echo $list['name']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="create_contact" class="btn btn-secondary">Submit</button>
    </form>
</div>
</div>
</div>
</section>


<!-- CDN LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>