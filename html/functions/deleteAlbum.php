<?php

require 'functions.php';

$albumId = $_GET['albumId'];

$errors = [];
$confirm = [];

$source = $_GET['source'];

$pdo = connectDB();

$queryprepared = $pdo->prepare("SELECT * FROM utrackpa_albums WHERE id=:id");
$queryprepared->execute(['id' => $albumId]);

if(!empty($queryprepared->fetch())){

if(!isAdmin()){
    if(getAlbumArtistById($albumId) != getUserId()){

        $errors[] = "You are not the artist of this album";
        $_SESSION['errors'] = $errors;

    }else{

    $queryprepared = $pdo->prepare("DELETE FROM utrackpa_albums WHERE id=:id");
    $queryprepared->execute(['id' => $albumId]);

    foreach(getTracksByAlbum($albumId,getUserId()) as $track){

    $queryprepared = $pdo->prepare("UPDATE utrackpa_tracks SET album = null WHERE id=:id");
    $queryprepared->execute(['id' => $track['id']]);

    }

    addToLogs(getUserId(),"Deleted an album : ".getAlbumNameById($albumId)."");

    $confirm[] = "Album has been deleted successfully";
    $_SESSION['confirm'] = $confirm;

    }
}else{

    $queryprepared = $pdo->prepare("DELETE FROM utrackpa_albums WHERE id=:id");
    $queryprepared->execute(['id' => $albumId]);

    foreach(getTracksByAlbum($albumId,getUserId()) as $track){

    $queryprepared = $pdo->prepare("UPDATE utrackpa_tracks SET album = null WHERE id=:id");
    $queryprepared->execute(['id' => $track['id']]);

    }

    addToLogs(getUserId(),"Deleted an album : ".getAlbumNameById($albumId)."");

    $confirm[] = "Album has been deleted successfully";
    $_SESSION['confirm'] = $confirm;

}


}else{

$errors[] = "This album does not exist";
$_SESSION['errors'] = $errors;

}


switch($source){
    case "admin":
        header('Location: ../admin_page.php?display=tracks');
    break;
    default:
        header("Location: ../templates/Home/dash-board.php");
    break;
}