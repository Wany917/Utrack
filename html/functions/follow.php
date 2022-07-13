<?php

    require 'functions.php';

    if(!isConnected()){
        die(header("Location: ../index.php"));
    }

    $follower = getUserId();
    $followed = getUserIdByUsername($_GET['followed']);

    $source = $_GET['source'];
    
	$pdo = connectDB();
    $queryPrepared = $pdo->prepare("INSERT INTO utrackpa_followers(follower, followed) VALUES (:follower, :followed);");
    $queryPrepared->execute(
        [
        "follower" => $follower,
        "followed" => $followed
        ]
    );

    addToLogs(getUserId(),"Started following ".getUserUsernameById($followed)."");

    switch($source){
        case "allUsers":
            header("Location: ../templates/Home/allUsers.php");
        break;
        case "dashboard":
            header("Location: ../templates/Home/dash-board.php");
        break;
    }
?>