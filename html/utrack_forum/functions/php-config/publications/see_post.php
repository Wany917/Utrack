<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../../includes/forum-layout/head.php'; ?>
    <link rel="icon" type="image/png" href="../../../../ressources/IMAGES-HEADER/icon.png">
    <link rel="stylesheet" href="../../../assets/styles/forum.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>

    <?php require '../../../../functions/functions.php';
          require '../../forum_functions.php';
    ?>
    <?php require 'view_one_post.php';
          require 'publish_comment.php';
          require 'see_all_comments.php';
    ?>
    <nav class="navbar navbar-expand-lg" style="background-color: #FFF6EA;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../../main/forum.php" alt="Home">
                <img src="../../../../ressources/IMAGES-HEADER/logo-utrack.png" alt="" width="150" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                    <button class="btn btn-link dropdown-toggle text-decoration-none" data-bs-toggle="dropdown"
                        role="button" id="dropdown">Post Menu</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="#">Hip pop post</a></li>
                        <li><a class="dropdown-item" href="#">Pop Post</li>
                        <li><a class="dropdown-item" href="#">Drill Post</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="../../../main/my_post.php">See my posts</a></li>
                        <li><a class="dropdown-item" href="../../../main/publish_content.php">Publish post</li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="forum.php">Return forum</a></li>
                        <li><a class="dropdown-item" href="../../../../templates/Home/dash-board.php">Return dashboard</a></li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php 
        if(isset($errors)){
            echo $errors;
        }else{
            if(isset($post_date_of_release))
                ?>
        <div class="">
            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <a href="../users_config/see_profile.php?id=<?=$post_id_author?>">
                                        <img class="profile rounded-circle shadow-1-strong me-3" src="../../../../ressources/img-profile/<?=getUserImgById(getUserIdByUsername($post_author))?>">
                                    </a>                                    
                                    <div>
                                        <h6 class="fw-bold mb-1"><?=$post_author;?></h6>
                                        <p class="text-muted small mb-0"><?=$post_date_of_release;?></p>
                                    </div>
                                </div>
                                <p class="text-muted text-end fs-5 small mb-0"><?=$post_category;?></p>

                                <p class="mt-3 mb-4 pb-2"><?=$post_content;?></p>

                                <div class="small d-flex justify-content-start">
                                    <a href="button" class="d-flex align-items-center me-3 text-decoration-none"
                                        data-bs-toggle="modal" data-bs-target="#myModal2">
                                        <p class="mb-0">See comments</p>
                                    </a>
                                    <a type="button" class="d-flex align-items-center me-3 text-decoration-none"
                                        data-bs-toggle="modal" data-bs-target="#myModal">
                                        <p class="mb-0">Comment</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Scrollable modal post comment-->
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content bg-forum">
                                        <div class="modal-header d-flex flex-start">
                                            <img class="profile rounded-circle shadow-1-strong me-3" width="40" src="../../../../ressources/img-profile/<?=getUserImgById(getUserId())?>"/>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <div class="card-footer py-3 border-0">
                                                    <div class="d-flex flex-start w-100">
                                                        <div class="form-outline w-100">
                                                            <p class="text-center lead msg">Message</p>
                                                            <textarea class="form-control" id="textAreaExample" rows="4"
                                                                name="comment" style="background: #fff;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-2 pt-1">
                                                        <button type="submit" name="send"
                                                            class="btn btn-outline-success btn-sm me-2">Post
                                                            comment</button>
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-warning btn-sm"
                                                data-bs-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- scrollable modal see comments-->
                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                            <div class="modal fade" id="myModal2">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                    <!-- see all comments -->
                                    <div class="modal-content">
                                        <div class="modal-header modal-comments d-flex justify-content-center">
                                            <h4 class="position-fixed pt-3">Post comments</h4>
                                        </div>
                                        <div class="modal-body modal-comments">
                                            <div class="container-fluid">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-md-12 col-lg-10 col-xl-8">
                                                        <div class="">
                                                            <div class="p-4">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="scrollable-auto" style="height: 300px;">

                                                                            <?php           
                                            //$post_id = getPostId($_GET['id']);
                                            //foreach (array(getAllComments($post_id)) as $comment)
                                            while($comment = $getAllComments->fetch()){
                                                ?>
                                                                            <div class="d-flex flex-start mt-4">
                                                                                <a href="../users_config/see_profile.php?id=<?=$comment["usr_id"];?>">
                                                                                    <img class="profile rounded-circle shadow-1-strong me-3" src="../../../../ressources/img-profile/<?=getUserImgById(getUserIdByUsername($comment['username']));?>" />
                                                                                </a>
                                                                                    <div class="flex-grow-1 flex-shrink-1">
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center">
                                                                                            <p class="mb-1"><?=$comment["username"];?><span class=" ms-2 small"><?=$comment["dateInserted"];?></span></p>
                                                                                            <a href="../soon.php"><span class="small">reply</span></a>
                                                                                        </div>
                                                                                        <p class="small mb-0">
                                                                                            <?=$comment['comment'];?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--</div>
                                                                            </div>
                                                                        <div class="d-flex flex-start">
                                                                            <img class="profile rounded-circle shadow-1-strong me-3" src="../../../../ressources/img-profile/<//?=getUserImgById(getUserIdByUsername($post_author));?>"/>
                                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center">
                                                                                            <p class="mb-1"><//?=$comment["username"];?><span class=" ms-2 small"><//?=$comment["dateInserted"];?></span></p>
                                                                                            <a href="#"><span class="small">reply</span></a>
                                                                                        </div>
                                                                                        <p class="small mb-0"><//?=$comment['comment'];?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                                                        
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer modal-comments">
                                                    <div class="position-fixed">
                                                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php    
    }
    ?>
</body>

</html>