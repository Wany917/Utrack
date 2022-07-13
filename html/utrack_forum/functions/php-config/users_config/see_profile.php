<?php 
require '../../../../functions/functions.php';
require 'get_user_profile.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../../includes/forum-layout/head.php'; ?>
    <link rel="stylesheet" href="../../../assets/styles/forum.css">
    <link rel="icon" type="image/png" href="../../../../ressources/IMAGES-HEADER/icon.png">
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #FFF6EA;">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../../main/forum.php" alt="Home">
            <img src="../../../../ressources/IMAGES-HEADER/logo-utrack.png" alt="" width="150" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../../main/forum.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <ul class="me-5 mt-3 dropdown">
                <button class="btn btn-link dropdown-toggle text-decoration-none lead fs-5" data-bs-toggle="dropdown" role="button" id="dropdown">Menu</button>
                <ul class="dropdown-menu" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="../soon.php" >Hip pop post</a></li>
                    <li><a class="dropdown-item" href="../soon.php" >Pop Post</li>
                    <li><a class="dropdown-item" href="../soon.php">Drill Post</a></li>
                        <hr class="dropdown-divider">
                    <li><a class="dropdown-item" href="../../../main/my_post.php" >See my posts</a></li>
                    <li><a class="dropdown-item" href="../../../main/publish_content.php" >Publish post</li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="../../../main/forum.php">Return forum</a></li>
                        <li><a class="dropdown-item" href="../../../../templates/Home/dash-board.php">return dashboard</a></li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
    <?php
        if(isset($error)){
            echo '<div class="d-flex justify-content-center my-5 py-5">
            <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
            <div class="toast-body">
            <div class="ms-5 ps-2">
               '.$error.'
                <a class="btn btn-outline-secondary btn-sm fw-lighter ms-4" type="button"  href="../../../main/forum.php">
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                return forum
                </a>
            </div>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            </div>
        </div>';
        }else{
            if(isset($getPostOfUsr)){
                ?>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row"
                        style="background-color: var(--bs-success-bg); height:200px;">
                        <div class="ms-4 mt-4 d-flex flex-column" style="width: 150px;">
                            <img src="../../../../ressources/img-profile/<?=getUserImgById(getUserIdByUsername($usrName))?>" alt="profile" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                            <h5><?=$usrName;?></h5>
                            <p></p>
                        </div>
                    </div>
                    <div class="p-4 text-black" style="background-color: #FFF6EA;">
                        <div class="d-flex justify-content-end text-center py-1">
                            <div class="px-3">
                                <p class="mb-1 h5"><?=count(getUserFollowers(getUserIdByUsername($usrName)));?></p>
                                <p class="small text-muted mb-0">Followers</p>
                            </div>
                            <div>
                                <p class="mb-1 h5"><?=count(getUserFollowed(getUserIdByUsername($usrName)));?></p>
                                <p class="small text-muted mb-0">Following</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 text-black">
                        <div class="mb-5">
                            <p class="lead fw-normal mb-1 text-center">Bio</p>
                            <div class="p-4" style="background-color: #FFF6EA;">
                                <p class="font-italic mb-1">Lorem ipsum dolor sit am</p>
                                <p class="font-italic mb-1">Lorem ipsum dolor sit am</p>
                                <p class="font-italic mb-0">Lorem ipsum dolor sit am</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="lead fw-normal mb-0">Recent Post</p>
                        </div>
            <?php while($postOfUsr = $getPostOfUsr->fetch()) {
                ?>
                <div class="row g-2">
                    <div class="col mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <?=$postOfUsr['title']?>
                                        <p class="mb-0 text-end">
                                            <a href="../../php-config/publications/see_post.php?id=<?=$postOfUsr['id']?>" class="text-muted text-decoration-none">Show</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } ?>     
        </div>
    </div>
    <?php
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>