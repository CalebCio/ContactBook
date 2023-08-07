<?php include("../../path.php");

include ROOT_PATH . "/app/classes/database/dbh.classes.php";
include(ROOT_PATH . "/app/classes/create.classes.php");
include ROOT_PATH . "/app/classes/createGroup.classes.php";

if(isset($_GET['idContacts']) && !empty($_GET['idContacts'])) {
    $edited = $_GET['idContacts'];
} else {
    header("Location:./index.php");
}

$group = new CreateGroup();
$class = new Create();

$idContact = intval($_GET['idContacts']);

$details=$class->getSingle($idContact);

$table=$group->getTable();


if (isset($_POST['editContact'])) {

    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $group_id = $_POST['group_id'];


    $results = $class->updateSingle($idContact,$fullname,$phonenumber,$email,$address,$gender,$group_id);

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
    <title>Edit Contacts</title>

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

    <h2 class="text-center mt-3">Update Contact</h2>

    <form action="" method="post">
        
        

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Full Name:</label>
            <input type="text" class="form-control" value="<?php echo $details['fullname']?>" id="Fullname" placeholder="Enter Fullname" name="fullname">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Phone Number:</label>
            <input type="number" class="form-control" value="<?php echo $details['contactPhone']?>" id="number" placeholder="Enter Phone number" name="phonenumber">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" value="<?php echo $details['contactEmail']?>" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" value="<?php echo $details['contactAddress']?>" placeholder="Enter Address" name="address">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Gender:</label>
            <input type="text" class="form-control" id="gender" value="<?php echo $details['contactGender']?>" placeholder="Enter Gender" name="gender">
        </div>

        <div class="mb-3">
            <label class="form-label">Group</label>
            <select name="group_id" class="form-select mt-3">
                <option value="0" >Uncategorized</option>
                <?php foreach ($table as $list): ?>
                    <?php if (!empty($group_id) && $group_id == $list['idGroups']): ?>
                        <option selected value="<?php echo $list['idGroups']; ?>"><?php echo $list['name']; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $list['idGroups']; ?>"   <?php echo $details['contactGroup'] === $list['idGroups'] ? "selected" : ""?> > <?php echo $list['name']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        
        <button type="submit" name="editContact" class="btn btn-secondary">Submit</button>
    </form>
</div>
</div>
</div>

</section>

<!-- CDN LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>