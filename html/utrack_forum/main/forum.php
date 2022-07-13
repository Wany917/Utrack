<?php 
require '../../functions/functions.php';
require '../functions/forum_functions.php';
require '../functions/php-config/publications/see_all_post.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/forum-layout/head.php'; ?>
    <link rel="stylesheet" href="../assets/styles/forum.css">
    <link rel="icon" type="image/png" href="ressources/IMAGES-HEADER/icon.png">
</head>


<body>
    <?php include '../includes/bs-layout/nav-bar.php'; ?>
    <div class="my-3 py-5"></div>
    <?php
        while ($post = $getAllPosts->fetch()) {
            ?>
        <div class="d-flex justify-content-center">
        <div class="card w-75 mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex align-items-center">
                        <div class="p-2 flex-fill">
                            <a href="../functions/php-config/users_config/see_profile.php?id=<?=$post["id_usr"];?>">
                                <img class="profile"src="../../ressources/img-profile/<?=getUserImgById(($post['id_usr']));?>">
                            </a>
                        </div>

                        <div class="p-2 flex-fill">
                            <h4 class="card-title"><?=$post["title"];?></h4>
                        </div>
                        <div class="p-2 text-end">
                        <?php
                        if(isAdmin()) {
                        echo'
                        <a href="../functions/php-config/users_config/delete_post.php?id='.$post['id'].'&source=forum" class="btn btn-danger">Delete</a>
                        ';
                        }
                        ?>
                        <a href="../functions/php-config/publications/see_post.php?id=<?=$post['id'];?>" class="btn btn-outline-secondary">See</a>
                        </div>
                    </div>
                    <p class="fw-lighter text-start ms-2"><?=getUserUsernameById($post['id_usr']);?></p>
                </div>
                <p class="card-text fw-light text-start mt-3"><?=$post["content"];?></p>
            </div>
            <div class="d-flex justify-content-between">
                <div class="cat-subCat-gory d-flex align-items-center ms-5">
                    <h6 class="fw-light pe-2"><?=$post["category"];?></h6>
                    <h6 class="fw-light "><?=$post["sub_category"];?></h6>
                </div>
                <div class="me-2 mb-1">
                    <button type="button" class="btn btn-outline-light btn-floating">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                    <span class="ms-2 badge">177</span>
                </div>
            </div>
            <div class="card-footer bg-transparent fw-lighter text-end border-dark">
                <?=$post["dateOfRelease"];?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>