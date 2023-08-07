<?php 

include("path.php"); 
include ROOT_PATH . "/app/classes/database/dbh.classes.php";
include ROOT_PATH . "/app/classes/createGroup.classes.php";

$titleHead = 'Contact Book';

$group = new CreateGroup();
$table=$group->getTable();

?>

<!-- Including header -->

<?php
include(ROOT_PATH . "/app/includes/header.php");
?>


<!-- Left Side Bar -->

<?php
include ROOT_PATH . "/app/includes/sidebar.php";
?>

<!-- Contact Body -->

<div class="col-sm-9 p-3">
    <h2 class="mt-3">Lists</h2>
    <div class="border border-success p-2" style="--bs-border-opacity: .5;">
        <div class="position-relative">
            <a class="btn" href="<?php echo BASE_URL . "/user/manageContact/index.php";?>" type="button">
                <div>
                    <i class="bi bi-people-fill"></i> All Contacts
                </div>
                <div class="position-absolute top-0 end-0">
                    <span class="badge bg-dark rounded-pill"><?php echo ($group->getCountGroup()) ?></span><i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>
    </div>

    <h6 class="mt-3">Groups</h6>

    <?php
    if (!empty($table)) {
        $counter=1;
        foreach($table as $list) {
            ?>

            <div class="border border-success p-2" style="--bs-border-opacity: .5;">
                <div class="position-relative">
                    <a href="user/manageContact/index.php?groupid=<?php echo $list['idGroups'] ;?>&groupName=<?php echo $list["name"]?>" class="btn">
                        <div>
                            <i class="bi bi-people-fill"></i> <?php echo $list['name']; ?>
                        </div>
                        <div class="position-absolute top-0 end-0">
                            <span class="badge bg-dark rounded-pill"><?php echo ($group->getCountGroup($list['idGroups'])) ?></span><i class="bi bi-chevron-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <?php
        }
    } 
    else { 
        ?>
        <div class="border border-success p-2" style="--bs-border-opacity: .5;">
            <div class="position-relative">
                <button class="btn" type="button">
                    <div>
                        <i class="bi bi-people-fill"></i> No Data Found
                    </div>
                    <div class="position-absolute top-0 end-0">
                        <span class="badge bg-dark rounded-pill">0</span><i class="bi bi-chevron-right"></i>
                    </div>
                </button>
            </div>
        </div>

    <?php } ?>

    <!-- if there are contacts with unknown group-->
    <?php if($group->getCountGroup(0) > 0 ) { ?> 
        <div class="border border-success p-2" style="--bs-border-opacity: .5;">
            <div class="position-relative">
                <a class="btn" href="user/manageContact/index.php?groupid=0&groupName=Uncategorized" type="button">
                    <div>
                        <i class="bi bi-people-fill"></i> Uncategorized
                    </div>
                    <div class="position-absolute top-0 end-0">
                        <span class="badge bg-dark rounded-pill"><?php echo ($group->getCountGroup(0)) ?></span><i class="bi bi-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
    <?php }?>

</div>
</div>
</div>

</section>


<!-- CDN LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>