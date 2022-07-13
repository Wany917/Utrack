<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Utrack</title>
    <link rel="icon" type="image/png" href="ressources/IMAGES-HEADER/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="index.php" alt="Home">
                <img src="./ressources/IMAGES-HEADER/logo-utrack.png" alt="" width="150" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./LR_SESSIONS/signUp.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./LR_SESSIONS/signIn.php">Sign In</a>
                    </li>
                    <li class="nav-item ms-lg-3 pb-1">
                        <a class="nav-link" href="./LR_SESSIONS/signIn.php"><img
                                src="./ressources/IMAGES-HEADER/bonhomme.png" width="18" height="21"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video-container">
        <video autoplay loop muted>
            <source src="ressources/KDOT.mp4" type="video/mp4">
        </video>
        <!-- TEXT-CONTENT -->
        <div class="caption">
            <div class="bg_content vh-100 d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 text-center">
                            <h1 class="display-4">MAKE YOURSELF KNOWN !</h1>
                            <p class="lead">Share your world !</p>
                            <a href="./LR_SESSIONS/signUp.php" class="btn btn-outline-secondary">Join Us !</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>