<?php 

include("../../path.php");
include(ROOT_PATH . "/app/classes/database/dbh.classes.php"); 
include(ROOT_PATH . "/app/classes/create.classes.php");
include(ROOT_PATH . "/app/classes/createGroup.classes.php");

$titleHead = 'Contacts List';

$class = new Create();
$alpha = $class->filterAlphabets();
$subHeader = 'Contacts';

if(isset($_GET['search__term']) && !empty($_GET['search__term'])){
    $table =$class->searchTable($_GET['search__term']);
    
}elseif(isset($_GET['groupid']) && intval($_GET['groupid'])!==''){

 $subHeader = isset($_GET['groupName']) ? $_GET['groupName'] . ' Contacts': 'Contacts'; 

 $table = $class->contactbyGroup($_GET['groupid']);
}
elseif(isset($_GET['date']) && !empty($_GET['date'])){
    $table = $class->contactbyDate($_GET['date']);
}
elseif(isset($_GET['alphabet']) && !empty($_GET['alphabet'])){
    $table = $class->contactAlphabet($_GET['alphabet']);
}
else{ 
    $table=$class->getTable();
}


function randomColor(){
    $colors = ["#65647C", "#7F669D", "#FF8DC7", "#7895B2", "#898AA6", "#68A7AD", "#94B49F", "#8E806A","#808080", "#A9A9A9", "#696969", "#808000", "#800080", "#2F4F4F", "#556B2F", "#483D8B", "#8B4513", "#2E8B57", "#708090", "#800000", "#808B96", "#4B0082", "#2F4F4F", "#696969", "#A0522D", "#556B2F", "#8B0000", "#8B4513"];


    $colorsCount = count($colors);
    $key = mt_rand(0,7);
    return $colors[$key];
}

if (isset($_POST['deleteContact'])) {

    $idContact=$_POST['idContact'];

    $results = $class->deleteSingle($idContact);

    if($results) {

        echo '

        <script>

        alert("Contact Deleted Successful");

        window.location.href="../../user/manageContact/index.php";

        </script>';

    } else {
       echo '
       <script>

       alert("An error occured");

       </script>';

   }

}

?>

<!-- Header -->

<?php

include(ROOT_PATH . "/app/includes/header.php");

?>


<!-- Left Side Bar Starts-->

<?php

include ROOT_PATH . "/app/includes/sidebar.php";

?>

<!-- Left Side Bar Ends -->


<!-- Contact Body -->

<div class="col-sm-9 p-3">

    <div class="d-flex justify-content-around">

        <a href="create.php" class="btn btn-secondary">Add Contact</a>
        <a href="index.php" class="btn btn-secondary">Manage Contacts</a>

    </div>

    <h2 class="text-center text-capitalize mt-3"><?= $subHeader ;?></h2>

    <p>Search:</p>
    <form class="d-flex mb-3" action="index.php" method="GET">

        <input type="text" name="search__term" class="form-control" placeholder="Search Contacts...">
        <input class="btn btn-secondary rounded-0" type="submit" value="search"/>

    </form>

    <div class="d-flex flex-column flex-lg-row justify-content-start gap-5">

        <form class="d-flex mb-3" action="<?= $_SERVER['REQUEST_URI'];?>" method="GET">

            <p> Filter by date: <input name="date" class="form-control" value="<?= isset($_GET['date']) ? date('Y-m-d', strtotime($_GET['date'])) : '' ;?>" type="date" onchange="this.form.submit()"></p>

        </form>

        <?php 
        if(!empty($alpha)){
            ?>
            <caption">Filter by alphabets: </caption>
                <div class="d-flex mb-3 flex-wrap gap-3">
                    <?php 
                    foreach ($alpha as $key => $value) {

                        ?>
                        <div class="text-uppercase py-1 px-2 rounded-1 bg-secondary">
                            <a class="text-white" style="text-decoration:none" href="./?alphabet=<?= strtoupper($value['alphabets']);?>"><?= $value['alphabets']?></a></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

            <caption">List of <?= strtolower($subHeader) ;?></caption>


                <?php

                if (!empty($table)) {

                    foreach($table as $list) {

                        ?>

                        <div class="accordion my-2" id="accordionExample">

                            <div class="accordion-item">

                                <h2 class="accordion-header">

                                    <button class="accordion-button text-capitalize collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $list['idContacts']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $list['idContacts']; ?>">
                                        <div class="avatar" style="background-color:<?php echo randomColor()?>"><?php echo substr($list['fullname'], 0, 1); ?></div>                            
                                        <?php echo $list['fullname']; ?>                     

                                        <span class="position-absolute start-50"><?php echo $list['contactPhone']; ?></span>

                                    </button>

                                </h2>


                                <div id="collapse<?php echo $list['idContacts']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">

                                    <div class="accordion-body">

                                        <p>
                                            Gender: <?php echo $list['contactGender']; ?>
                                        </p>

                                        <p>
                                            Email: <?php echo $list['contactEmail']; ?>
                                        </p>

                                        <p>
                                            Address: <?php echo $list['contactAddress']; ?>
                                        </p>

                                        <p>
                                            Group: <?php echo $list['contactGroupName'] ?? 'Uncategorized' ; ?>
                                        </p>

                                        <p>
                                            Actions: <br>

                                            <a href="edit.php?idContacts=<?php echo $list['idContacts']; ?>" class="btn btn-primary edit text-white">Edit</a> <br>

                                            <form action="" method="post">

                                                <input type="hidden" name="idContact" value=<?php echo $list['idContacts']?>>

                                                <input class="btn btn-danger" type="submit" name="deleteContact" 
                                                onclick="return confirm(`Are you sure you want to delete contact <?php echo $list["fullname"]?>`)" value='Delete'>

                                            </form> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                }else{
                    ?>
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">

                            <h2 class="accordion-header">

                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                    No Data Found                    

                                    <span class="position-absolute start-50"></span>

                                </button>

                            </h2>
                            <a href="index.php"><small> Show All Data</small></a>

                        <?php } ?>
                    </div>
                </div>
            </div>

        </section>


        <!-- CDN LINK -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    </body>

    </html>