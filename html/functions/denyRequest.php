<?php

require 'functions.php';

if(!isConnected()){
    die(header("Location: ../index.php"));
}

$trackId = $_GET['track'];
$userId = $_GET['user'];

$errors = [];
$confirm = [];

$pdo = connectDB();

$queryprepared = $pdo->prepare("SELECT * FROM utrackpa_tracks WHERE id=:id");
$queryprepared->execute(['id' => $trackId]);

if(!empty($queryprepared->fetch())){

    $queryprepared = $pdo->prepare("SELECT * FROM utrackpa_users_requests WHERE requestedTrack=:id AND requestinguser=:user");
    $queryprepared->execute([            
                            'id' => $trackId,
                            'user' => $userId 
                            ]);

    if(!empty($queryprepared->fetch())){

        $queryprepared = $pdo->prepare("UPDATE utrackpa_users_requests SET statut = 2 WHERE requestedTrack=:id AND requestinguser=:user");
        $queryprepared->execute([
            'id' => $trackId,
            'user' => $userId        
        ]);

        $confirm[] = "Permission denied successfully";

    }else{

        $errors[] = "This request does not exist";

    }
    
}else{

    $errors[] = "This track does not exist";
    
}

$_SESSION['confirm'] = $confirm;
$_SESSION['errors'] = $errors;

header("Location: ../templates/Home/dash-board.php");