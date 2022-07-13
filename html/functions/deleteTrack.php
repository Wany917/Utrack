<?php

require 'functions.php';

$trackId = $_GET['trackId'];

$errors = [];
$confirm = [];
$source = $_GET['source'];

$pdo = connectDB();

$queryprepared = $pdo->prepare("SELECT * FROM utrackpa_tracks WHERE id=:id");
$queryprepared->execute(['id' => $trackId]);

if(!empty($queryprepared->fetch())){

if(!isAdmin()){
    if(getTrackArtistById($trackId) != getUserId()){

        $errors[] = "You are not the artist of this track";
        $_SESSION['errors'] = $errors;

    }else{

    $queryprepared = $pdo->prepare("DELETE FROM utrackpa_tracks WHERE id=:id");
    $queryprepared->execute(['id' => $trackId]);

    addToLogs(getUserId(),"Deleted a track : ".getTrackNameByTrackId($trackId)."");

    $confirm[] = "Track has been deleted successfully";
    $_SESSION['confirm'] = $confirm;

    }
}else{

    $queryprepared = $pdo->prepare("DELETE FROM utrackpa_tracks WHERE id=:id");
    $queryprepared->execute(['id' => $trackId]);

    addToLogs(getUserId(),"Deleted a track : ".getTrackNameByTrackId($trackId)."");

    $confirm[] = "Track has been deleted successfully";
    $_SESSION['confirm'] = $confirm;

}

}else{

$errors[] = "This track does not exist";
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