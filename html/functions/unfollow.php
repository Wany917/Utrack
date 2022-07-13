<?php

    require 'functions.php';

    if(!isConnected()){
        die(header("Location: ../index.php"));
    }

    $follower = getUserId();
    $followed = getUserIdByUsername($_GET['followed']);

    $source = $_GET['source'];

	$pdo = connectDB();
    $queryPrepared = $pdo->prepare("DELETE FROM utrackpa_followers WHERE follower='$follower' AND followed='$followed';");
    $queryPrepared->execute();

    addToLogs(getUserId(),"Unfollowed ".getUserUsernameById($followed)."");

    switch($source){
        case "allUsers":
            header("Location: ../templates/Home/allUsers.php");
        break;
        case "dashboard":
            header("Location: ../templates/Home/dash-board.php");
        break;
    }

?>