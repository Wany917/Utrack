<?php

require 'functions.php';

if(!isConnected()){
    header("Location: ../index.php");
}else{

$track = $_GET['track'];
$artist = $_GET['artist'];
$album = $_GET['album'];

if(getUserId() == $artist){

$confirm = [];
$errors = [];

$pdo = connectDB();

$queryPrepared = $pdo->prepare("UPDATE utrackpa_tracks SET album = null WHERE id =:id");
$queryPrepared->execute(['id' => $track]);

addToLogs(getUserId(),"Removed : ".getTrackNameByTrackId($track)." from : ".getAlbumNameById($album)."");

$confirm[] = "Track has been removed";
$_SESSION['confirm'] = $confirm;
header("Location: ../templates/Home/album.php?album=$album&artist=$artist");

}else{

$errors[] = "You are not the artist";
$_SESSION['errors'] = $errors;
header("Location: ../templates/Home/album.php?album=$album&artist=$artist");

}
}