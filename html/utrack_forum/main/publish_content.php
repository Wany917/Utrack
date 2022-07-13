<?php 
require '../../functions/functions.php';
include '../functions/php-config/publications/publish.conf.php';
$pdo = connectDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/forum-layout/head.php';?>
    <link rel="stylesheet" href="../assets/styles/forum.css">
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #FFF6EA;">
    <div class="container-fluid">
        <a class="navbar-brand" href="forum.php" alt="Home">
            <img src="../../ressources/IMAGES-HEADER/logo-utrack.png" alt="" width="150" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <button class="btn btn-link dropdown-toggle text-decoration-none lead fs-5" data-bs-toggle="dropdown" role="button" id="dropdown">Menu</button>
                <ul class="dropdown-menu" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="../functions/php-config/soon.php" >Hip pop post</a></li>
                    <li><a class="dropdown-item" href="../functions/php-config/soon.php" >Pop Post</li>
                    <li><a class="dropdown-item" href="../functions/php-config/soon.php">Drill Post</a></li>
                        <hr class="dropdown-divider">
                    <li><a class="dropdown-item" href="my_post.php" >See my posts</a></li>
                    <li><a class="dropdown-item" href="publish_content.php" >Publish post</li>
                    <!--<li><a class="dropdown-item" href="../functions/php-config/users_config/edit_post.php">Edit post</a></li>-->
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="forum.php">Return forum</a></li>
                        <li><a class="dropdown-item" href="../../templates/Home/dash-board.php">return dashboard</a></li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-3"></div>
            <div class="col-6">
                <form class="row g-3" method="POST">
                    <!--TOAST -->
                     <!--    -->
                    <?php if(isset($errors)){
                        echo '<h5 class="d-flex justify-content-center">'.$errors.'</h5>';
                    } elseif(isset($successMsg)){
                        echo '<h5 class="d-flex justify-content-center">'.$successMsg.'</h5>';
                    }    
                    ?>
                    <div class="col-md-6">
                        <label class="form-label labelTitle">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label labelTitle">Category</label>
                        <select name="category" class="form-select" aria-label="Default select example">
                            <option value="Hip Pop">Hip Pop</option>
                            <option value="Pop">Pop</option>
                            <option value="Drill">Drill</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label labelTitle">Sub Categories</label>
                        <select name="sub_category" class="form-select" aria-label="Default select example">
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
                        <textarea name="content" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" name="submit" class="btn btn-outline-success btn-sm">Publish !</button>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>