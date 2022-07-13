<?php

require 'functions.php';

if(!isConnected()){
    header("Location: ../index.php");
}else{

$artist = $_GET['artist'];
$album = $_GET['album'];

$confirm = [];
$errors = [];

if(empty($_POST['tracks'])){

    $errors[] = "At least one track must be selected";
    $_SESSION['errors'] = $errors;
    header("Location: ../templates/Home/album.php?album=$album&artist=$artist");

}else{

foreach($_POST['tracks'] as $key => $track){

$track = $key;

if(getUserId() == $artist){


    if(getTrackAlbumByTrackId($track) != null){

        $errors[] = "A track is already in an album";
        $_SESSION['errors'] = $errors;
        header("Location: ../templates/Home/album.php?album=$album&artist=$artist");

    }else{

    $pdo = connectDB();

    $queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_tracks WHERE id =:id");
    $queryPrepared->execute(['id' => $track]);

    if(empty($queryPrepared->fetch())){ 

    $errors[] = "A track does not exist";
    $_SESSION['errors'] = $errors;
     header("Location: ../templates/Home/album.php?album=$album&artist=$artist");

    }else{
    $pdo = connectDB();

    $queryPrepared = $pdo->prepare("UPDATE utrackpa_tracks SET album=:album WHERE id =:id");
    $queryPrepared->execute(['id' => $track,'album' => $album]);

    addToLogs(getUserId(),"Added a track : ".getTrackNameByTrackId($track)." to his album : ".getAlbumNameById($album)."");

    }

    }

}else{

    $errors[] = "You are not the artist";
    $_SESSION['errors'] = $errors;
    header("Location: ../templates/Home/album.php?album=$album&artist=$artist");

}
}
}

if(empty($errors)){
$confirm[] = "Tracks has been successfully added to the album";
$_SESSION['confirm'] = $confirm;
header("Location: ../templates/Home/album.php?album=$album&artist=$artist");
}

}