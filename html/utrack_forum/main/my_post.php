<?php 
require '../../functions/functions.php';
require '../functions/forum_functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/forum-layout/head.php'?>
    <link rel="stylesheet" href="../assets/styles/forum.css">
</head>

<body>
    <?php include '../includes/bs-layout/nav_bar.php'?>
    <div class="container-fluid mt-5 pt-5">
    <?php foreach (getAllUserPosts() as $post){
        ?>
            
                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="">
                                    <?=$post['category']?>
                                </h5>
                                <a href="../functions/php-config/publications/see_post.php?id=<?=$post['id']?>" class="btn btn-outline-secondary">See</a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?=$post['sub_category']?></h5>

                                <p class="card-text fw-light"><?=$post['title']?></p>
                                <p class="card-text"><?=$post['content']?></p>

                                <a href="../functions/php-config/users_config/edit_post.php?id=<?=$post['id']?>" class="btn btn-warning">Modify</a>
                                <a href="../functions/php-config/users_config/delete_post.php?id=<?=$post['id']?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            
        <?php
        }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>