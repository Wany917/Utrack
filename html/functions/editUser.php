<?php

require 'functions.php';

if(!isConnected()){
    header("Location: ../index.php");
}else if(!isAdmin()){
    header("Location: ../templates/Home/Home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Utrack</title>
    <link rel="icon" type="image/png" href="../ressources/IMAGES-HEADER/icon.png">

    <link rel="stylesheet" href="../styles/admins.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" type="image/png" href="../ressources/IMAGES-HEADER/icon.png">
</head>

<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../ressources/IMG-CONTENT/enceintes.png" height="30" alt="logo">
                </span>

                <div class="text logo-text">
                    <span class="name">Utrack</span>
                    <span class="profession">@Admin</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class=' ms-2 bx bx-search-alt icon-search'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../admin_page.php?display=users">
                            <i class='bx bx-list-ul icon'></i>
                            <span class="text nav-text">Users List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bxs-bell-ring icon'></i>
                            <span class="text nav-text">Notification</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../admin_page.php?display=newsletter">
                            <i class='bx bxs-news icon'></i>
                            <span class="text nav-text">Newsletters</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bxs-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Stats_users</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bxs-pie-chart-alt icon'></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bxs-wallet icon'></i>
                            <span class="text nav-text">Suscribers</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="functions/logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>
    </nav>

    <div class="home">
    <nav class="navbar">
        <div class="container d-flex justify-content-start ms-5">
            <a class="navbar-brand" href="../templates/Home/dash-board.php">
                <img src="../ressources/IMAGES-HEADER/logo-utrack.png" alt="" width="200" height="100">
            </a>
        </div>
    </nav>


<?php

//Vérification de l'utilisateur

$id = $_GET['id'];

if(!isConnected()){
	die(header('Location: ../index.php'));
}
    $pdo = connectDB();

    $queryPrepared = $pdo->prepare("SELECT * FROM utrackpa_users WHERE id = $id");
    $queryPrepared->execute();
    $user = $queryPrepared->fetch();
    echo"

<div class='container text-center'>
    <h1>Modifier le compte de l'utilisateur</h1>

    <table class='table'>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Profile Image</th>
    </tr>
         <tr>
            <td>".$user['id']."</td>
            <td>".$user['username']."</td>
            <td>".$user['email']."</td>
            <td>
            <img src='../ressources/img-profile/".$user['img_profile']." 'width='80'>
            </td>
        </tr>
    </table>
    <h1>Vos modifications</h1>
        <form method='POST' action='editedUser.php?id=".$user['id']."&amp;source=admin' enctype='multipart/form-data'>
            
            <input type='text' class='form-control' name='username' placeholder='Votre username'><br>
            <input type='email' class='form-control' name='email' placeholder='Votre email'><br>
            <input type='text' class='form-control' name='pwd' placeholder='Votre nouveau mot de passe'><br>

            <input type='file' class='btn' name='img-profile' accept='.png,.jpg,.jpeg'><br>
            <input type='submit' class='btn mt-3' value='Valider les modifications'>

        </form>
</div>
    ";
?>

</body>

</html>