<?php 
require 'get_post_info.php';
require 'edited_post.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../../../includes/forum-layout/head.php';?>
        <link rel="icon" type="image/png" href="../../../../ressources/IMAGES-HEADER/icon.png">
        <link rel="stylesheet" href="../../../assets/styles/forum.css">
    </head>

<body>
    <nav class="navbar navbar-expand-lg">
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
                        <a class="nav-link active" aria-current="page" href="forum.php"></a>
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
                        <li><a class="dropdown-item" href="#">Hip pop post</a></li>
                        <li><a class="dropdown-item" href="#">Pop Post</li>
                        <li><a class="dropdown-item" href="#">Drill Post</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="../../../main/my_post.php">See my posts</a></li>
                        <li><a class="dropdown-item" href="../../../main/publish_content.php">Publish post</li>
                        <!--<li><a class="dropdown-item" href="edit_post.php">Edit post</a></li>-->
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="../../../../templates/Home/dash-board.php">return
                                dashboard</a></li>
                    </ul>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!--- EDIT POST -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-3"></div>
            <div class="col-6">
                <form class="row g-3" method="POST">
                    <!--TOAST -->

                    <?php if(isset($errors)){
                        echo '
                        <div class="">
                            <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                            <div class="toast-body">
                            <div class="ms-5 ps-2">
                                '.$errors.'
                                <a class="btn btn-outline-secondary btn-sm fw-lighter ms-4" type="button"  href="../../../main/forum.php">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>return forum</a>
                            </div>
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            </div>
                        </div>';
                    } elseif(isset($successMsg)){
                        echo '
                        <div class="">
                            <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                            <div class="toast-body">
                            <div class="ms-5 ps-2">
                            '.$successMsg.'
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
                    }    
                    ?>
                    <?php
                        if(isset($postContent)){
                            ?>
                            <div class="col-md-6">
                                <label class="form-label labelTitle">Title</label>
                                <input type="text" name="title" class="form-control" value="<?=$postTitle;?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label labelTitle">Category</label>
                                <select name="category" class="form-select" aria-label="Default select example">
                                    <option value="<?=$postCategory;?>"><?=$postCategory;?></option>
                                    <option value="Hip Pop">Hip Pop</option>
                                    <option value="Pop">Pop</option>
                                    <option value="Drill">Drill</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label labelTitle">Sub Categories</label>
                                <select name="sub_category" class="form-select" aria-label="Default select example">
                                    <option value="<?=$postSubCategory;?>"><?=$postSubCategory;?></option>
                                    <option value="Trap">Trap</option>
                                    <option value="Rap / Old school">Rap / Old School</option>
                                    <option value="R&B">R&B</option>
                                    <option value="Pop Rock">Pop Rock</option>
                                    <option value="Latin Pop">Latin Pop</option>
                                    <option value="Uk Drill">Uk Drill</option>
                                    <option value="Jersey Concept">Jersey Concept</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label labelTitle">Content</label>
                                <textarea name="content" class="form-control" value="" placeholder="Description"><?=$postContent;?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="modified" class="btn btn-outline-success btn-sm">Modified !</button>
                            </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <?php
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>