<?php 

$group = new CreateGroup();
$groupTable=$group->getTable();

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Linking Css file  -->
    <link rel="stylesheet" href="../../assets/CSS/styles.css?ver=<?= date("dmyHis") ;?>"> 

    <style>

        section {

            padding: 60px 0;

        }

    </style>

    <title><?= $titleHead ?></title>

</head>

<body>


<header>

    <nav class="navbar navbar-expand-md fixed-top bg-white navbar-light">

        <div class="container-xxl">

            <a href="../../index.php" class="navbar-brand">

                <span class="fw-bold text-secondary">

                    Contact<span class="fw-bold text-warning">Book</span>

                    <i class="bi bi-book-half"></i>

                </span>

            </a>

            <!-- Toggle button for mobile nav-->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Navbar Links -->

            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">

                <ul class="navbar-nav nav-underline">

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo BASE_URL . "/user/manageContact/index.php";?>">Contacts</a>

                    </li>

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">

                            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">

                                Groups

                            </button>
                        
                            <ul class="dropdown-menu dropdown-menu-dark">

                                <?php

                                if (!empty($groupTable)) {

                                    $counter=1;

                                    foreach($groupTable as $list) {

                                        ?>

                                        <li><a class="dropdown-item" href="user/manageContact/index.php?groupid=<?php echo $list['idGroups'] ;?>&groupName=<?php echo $list["name"]?>"><?php echo $list['name']; ?></a></li>

                                        <?php

                                    }

                                } 

                                else { 

                                    ?>

                                    <li><a class="dropdown-item" href="#">No Data</a></li>

                                <?php } ?>

                            </ul>

                        </li>

                    </ul>

                </ul>

            </div>

        </div>

    </nav>

</header>