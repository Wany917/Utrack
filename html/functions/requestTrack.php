<?php

require 'functions.php';

if(!isConnected()){
    die(header("Location: ../index.php"));
}

$trackId = $_GET['trackId'];
$userId = $_GET['user'];

$requesting = getUserId();
$requestingAccType = getUserAccountTypeById(getUserId());

$errors = [];
$confirm = [];

$pdo = connectDB();

$queryprepared = $pdo->prepare("SELECT * FROM utrackpa_tracks WHERE id=:id");
$queryprepared->execute(['id' => $trackId]);

if(!empty($queryprepared->fetch())){

$confirm[] = "Request sent";

$queryprepared = $pdo->prepare("INSERT INTO utrackpa_users_requests(requestingUser,requestingUserAccountType,requestedUser,requestedTrack,statut) 
                                VALUES (:requestingUser,:requestingUserAccountType,:requestedUser,:requestedTrack,:statut)");
$queryprepared->execute([
    
    'requestingUser'=> $requesting,
    'requestingUserAccountType'=> $requestingAccType,
    'requestedUser'=> $userId,
    'requestedTrack'=> $trackId,
    'statut'=> 1

]);

}else{

$errors[] = "This track does not exist";

}

$_SESSION['confirm'] = $confirm;
$_SESSION['errors'] = $errors;

header("Location: ../templates/Home/user.php?user=$userId");