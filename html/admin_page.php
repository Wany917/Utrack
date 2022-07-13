<?php
require 'functions/functions.php';

if(!isConnected()){
    header("Location: index.php");
}else if(!isAdmin()){
    header("Location: templates/Home/Home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Utrack</title>
    <link rel="icon" type="image/png" href="ressources/IMAGES-HEADER/icon.png">

    <link rel="stylesheet" href="styles/admins.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" type="image/png" href="ressources/IMAGES-HEADER/icon.png">
</head>

<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="ressources/img-profile/<?=getUserImgById(getUserId())?>" height="30" alt="logo">
                </span>

                <div class="text logo-text">
                    <span class="name">
                    <?php
                        printf(getUserUsernameById(getUserId()));
                    ?>
                    </span>
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
                        <a href="admin_page.php?display=users">
                            <i class='bx bx-list-ul icon'></i>
                            <span class="text nav-text">Users List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="admin_page.php?display=newsletter">
                            <i class='bx bxs-news icon'></i>
                            <span class="text nav-text">Newsletters</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="admin_page.php?display=logs">
                            <i class='bx bxl-stack-overflow icon'></i>
                            <span class="text nav-text">Logs</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="admin_page.php?display=tracks">
                            <i class='bx bxs-music icon'></i>
                            <span class="text nav-text">Tracks</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="admin_page.php?display=albums">
                            <i class='bx bxs-album icon' ></i>
                            <span class="text nav-text">Albums</span>
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
            <a class="navbar-brand" href="templates/Home/dash-board.php">
                <img src="ressources/IMAGES-HEADER/logo-utrack.png" alt="" width="200" height="100">
            </a>
        </div>
    </nav>

    <?php 
    $display = $_GET['display'];


    switch ($display){

        /// USERS

        case 'users':
        echo'
        <div class="tableList ms-4 p-4">
            <div class="overflow-auto" style="height:500px">

            ';if(!empty($_SESSION['errors'])){
                echo "<div class='errors mt-3 text-center'>
                ";
                foreach($_SESSION['errors'] as $error){
                    printf($error);
                    echo"<br>";
                }
                echo"
                </div>
                ";
                unset($_SESSION['errors']);
            }

            if(!empty($_SESSION['confirm'])){
                echo "<div class='errors mt-3 text-center'>
                ";
                foreach($_SESSION['confirm'] as $confirm){
                    printf($confirm);
                    echo"<br>";
                }
                echo"
                </div>
                ";
                unset($_SESSION['confirm']);
            }
            echo'

            <h4>Users List</h4>
            <table class="table table-borderless mt-4 usrList">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Profile picture</th>
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Username</th>
                        <th scope="col" class="text-center">Birthday</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Acc_Type</th>
                        <th scope="col" class="text-center">DateInserted</th>
                        <th scope="col" class="text-center">DateUpdated</th>
                        <th scope="col" class="text-center">Verified</th>
                        <th scope="col" class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>';

                foreach (getAllUsers() as $user){

                    $id = $user["id"];

                    echo '<tr>
                    <td><img src="ressources/img-profile/'.$user["img_profile"].'" height="30"></td>
                    <td>'.$id.'</td>
                    <td>'.getUserUsernameById($id).'</td>
                    <td>'.getUserBirthdayById($id).'</td>
                    <td>'.getUserEmailById($id).'</td>
                    <td>'.getUserAccountTypeById($id).'</td>
                    <td>'.getUserDateInsertedById($id).'</td>
                    <td>'.getUserDateUpdatedById($id).'</td>
                    <td>'.getUserVerifiedById($id).'</td>
                    
                    <td>
                    <div class="btn-group" role="group">
                        <a href="functions/deleteUser.php?id='.$id.'" >
                            <button type="button" class="btn"><img src="ressources/IMG-CONTENT/cross.png" width="20" height="20" alt="Delete"></button>
                        </a>
                        <a href="functions/editUser.php?id='.$id.'" >
                            <button type="button" class="btn"><img src="ressources/IMG-CONTENT/pen.png" width="20" height="20" alt="edit"></button>
                        </a>
                    </div>
                    </td>

                </tr>';

                }
                echo'
                </tbody>
            </table>
            </div>
            </div>
        </div>
        ';
        break;

        /// NEWSLETTER

        case 'newsletter':

            echo'
            <div class="container newsletter ps-1">
                <div class="row">
                    <div class="col-11 text-center">

                    ';
                    if(!empty($_SESSION['errors'])){
                        echo "<div class='errors mt-3 text-center'>
                        ";
                        foreach($_SESSION['errors'] as $error){
                            printf($error);
                            echo"<br>";
                        }
                        echo"
                        </div>
                        ";
                        unset($_SESSION['errors']);
                    }
        
                    if(!empty($_SESSION['confirm'])){
                        echo "<div class='errors mt-3 text-center'>
                        ";
                        foreach($_SESSION['confirm'] as $confirm){
                            printf($confirm);
                            echo"<br>";
                        }
                        echo"
                        </div>
                        ";
                        unset($_SESSION['confirm']);
                    }
                    echo'
                        <h2 class="mt-4">Newsletter</h2><br>
                <form action="functions/sendNewsletter.php" method="post">
                    <input type="text" name="subject" class="newsletterinputs" placeholder="Newsletter Subject"><br>
                    <textarea name="mailbody" class="newsletterinputs newslettercontent mt-5" placeholder="Newsletter Content"></textarea><br>
                    <input type="submit" class="newsletterinputs" value="Send the newsletter">
                </form>

                    </div>
                </div>
            </div>
            ';
            break;
        
            /// LOGS

            case 'logs':
                echo'
                <div class="text-center ms-4 p-4 logs">
                    <div class="overflow-auto" style="height:500px">
        
                    ';if(!empty($_SESSION['errors'])){
                        echo "<div class='errors mt-3 text-center'>
                        ";
                        foreach($_SESSION['errors'] as $error){
                            printf($error);
                            echo"<br>";
                        }
                        echo"
                        </div>
                        ";
                        unset($_SESSION['errors']);
                    }
        
                    if(!empty($_SESSION['confirm'])){
                        echo "<div class='errors mt-3 text-center'>
                        ";
                        foreach($_SESSION['confirm'] as $confirm){
                            printf($confirm);
                            echo"<br>";
                        }
                        echo"
                        </div>
                        ";
                        unset($_SESSION['confirm']);
                    }
                    echo'
        
                    <h4>Logs</h4>
                    <table class="table table-borderless mt-4 usrList">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">User</th>
                                <th scope="col" class="text-center">Action</th>
                                <th scope="col" class="text-center">DateInserted</th>
                            </tr>
                        </thead>
                        <tbody>';
        
                        foreach (getAllLogs() as $log){
                
                            echo '<tr>
                            <td>'.getUserUsernameById($log['usr_id']).'</td>
                            <td>'.$log['usr_action'].'</td>
                            <td>'.$log['date_inserted'].'</td>        
                        </tr>';
        
                        }
                        echo'
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
                ';
                break;

                /// TRACKS

                case 'tracks':
                    echo'
                    <div class="text-center ms-4 p-4 logs">
                        <div class="overflow-auto" style="height:500px">
            
                        ';if(!empty($_SESSION['errors'])){
                            echo "<div class='errors mt-3 text-center'>
                            ";
                            foreach($_SESSION['errors'] as $error){
                                printf($error);
                                echo"<br>";
                            }
                            echo"
                            </div>
                            ";
                            unset($_SESSION['errors']);
                        }
            
                        if(!empty($_SESSION['confirm'])){
                            echo "<div class='errors mt-3 text-center'>
                            ";
                            foreach($_SESSION['confirm'] as $confirm){
                                printf($confirm);
                                echo"<br>";
                            }
                            echo"
                            </div>
                            ";
                            unset($_SESSION['confirm']);
                        }
                        echo'
            
                        <h4>All Tracks</h4>
                        <table class="table table-borderless mt-4 usrList">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Track Cover</th>
                                    <th scope="col" class="text-center">Track Name</th>
                                    <th scope="col" class="text-center">Artist</th>
                                    <th scope="col" class="text-center">Category</th>
                                    <th scope="col" class="text-center">Release Date</th>
                                    <th scope="col" class="text-center">Manage</th>
                                </tr>
                            </thead>
                            <tbody>';
            
                            foreach (getAllTracks() as $track){
                    
                                echo '<tr>
                                <td><img src="ressources/tracks_cover/'.$track["img_profile"].'" height="30"></td>
                                <td>'.$track['title'].'</td>
                                <td>'.getUserUsernameById($track['artist']).'</td>
                                <td>'.$track['category'].'</td> 
                                <td>'.$track['dateOfRelease'].'</td>
                                <td><a href="functions/deleteTrack.php?trackId='.$track["id"].'&source=admin" type="button" class="btn btn-outline-secondary">Delete</a></td>            
                            </tr>';
            
                            }
                            echo'
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                    ';
                    break;

                    /// ALBUMS

                    case 'albums':
                        echo'
                        <div class="text-center ms-4 p-4 logs">
                            <div class="overflow-auto" style="height:500px">
                
                            ';if(!empty($_SESSION['errors'])){
                                echo "<div class='errors mt-3 text-center'>
                                ";
                                foreach($_SESSION['errors'] as $error){
                                    printf($error);
                                    echo"<br>";
                                }
                                echo"
                                </div>
                                ";
                                unset($_SESSION['errors']);
                            }
                
                            if(!empty($_SESSION['confirm'])){
                                echo "<div class='errors mt-3 text-center'>
                                ";
                                foreach($_SESSION['confirm'] as $confirm){
                                    printf($confirm);
                                    echo"<br>";
                                }
                                echo"
                                </div>
                                ";
                                unset($_SESSION['confirm']);
                            }
                            echo'
                    
                            <h4>All albums</h4>
                            <table class="table table-borderless mt-4 usrList">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Album Cover</th>
                                        <th scope="col" class="text-center">Album Name</th>
                                        <th scope="col" class="text-center">Artist</th>
                                        <th scope="col" class="text-center">Category</th>
                                        <th scope="col" class="text-center">Release Date</th>
                                    </tr>
                                </thead>
                                <tbody>';
                
                                foreach (getAllAlbums() as $album){
                    
                                    echo '<tr>
                                    <td><img src="ressources/img-profile/'.$album["img_profile"].'" height="30"></td>
                                    <td>'.getUserUsernameById($album['artist']).'</td>
                                    <td>'.$album['title'].'</td>
                                    <td>'.$album['category'].'</td> 
                                    <td>'.$album['dateOfRelease'].'</td>
                                    <td>
                                    <a href="functions/deleteAlbum.php?albumId='.$album['id'].'&source=admin" type="button" class="btn btn-outline-secondary">Delete</a>
                                    </td>            
                                </tr>';
                
                                }
                                echo'
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                        ';
                        break;
                

                default:
                    echo'
                    <div class="tableList ms-4 p-4">
                        <div class="overflow-auto" style="height:500px">
            
                        ';if(!empty($_SESSION['errors'])){
                            echo "<div class='errors mt-3 text-center'>
                            ";
                            foreach($_SESSION['errors'] as $error){
                                printf($error);
                                echo"<br>";
                            }
                            echo"
                            </div>
                            ";
                            unset($_SESSION['errors']);
                        }
            
                        if(!empty($_SESSION['confirm'])){
                            echo "<div class='errors mt-3 text-center'>
                            ";
                            foreach($_SESSION['confirm'] as $confirm){
                                printf($confirm);
                                echo"<br>";
                            }
                            echo"
                            </div>
                            ";
                            unset($_SESSION['confirm']);
                        }
                        echo'
            
                        <h4>Users List</h4>
                        <table class="table table-borderless mt-4 usrList">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Profile picture</th>
                                    <th scope="col" class="text-center">Id</th>
                                    <th scope="col" class="text-center">Username</th>
                                    <th scope="col" class="text-center">Birthday</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Acc_Type</th>
                                    <th scope="col" class="text-center">DateInserted</th>
                                    <th scope="col" class="text-center">DateUpdated</th>
                                    <th scope="col" class="text-center">Verified</th>
                                    <th scope="col" class="text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>';
            
                            foreach (getAllUsers() as $user){
            
                                $id = $user["id"];
            
                                echo '<tr>
                                <td><img src="ressources/img-profile/'.$user["img_profile"].'" height="30"></td>
                                <td>'.$id.'</td>
                                <td>'.getUserUsernameById($id).'</td>
                                <td>'.getUserBirthdayById($id).'</td>
                                <td>'.getUserEmailById($id).'</td>
                                <td>'.getUserAccountTypeById($id).'</td>
                                <td>'.getUserDateInsertedById($id).'</td>
                                <td>'.getUserDateUpdatedById($id).'</td>
                                <td>'.getUserVerifiedById($id).'</td>
                                
                                <td>
                                <div class="btn-group" role="group">
                                    <a href="functions/deleteUser.php?id='.$id.'" >
                                        <button type="button" class="btn"><img src="ressources/IMG-CONTENT/cross.png" width="20" height="20" alt="Delete"></button>
                                    </a>
                                    <a href="functions/editUser.php?id='.$id.'" >
                                        <button type="button" class="btn"><img src="ressources/IMG-CONTENT/pen.png" width="20" height="20" alt="edit"></button>
                                    </a>
                                </div>
                                </td>
            
                            </tr>';
            
                            }
                            echo'
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                    ';
                    break;

}
?>
    <script src="scriptAdmin.js"></script>
</body>

</html>