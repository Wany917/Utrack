<?php

    require 'functions.php';

    if(!isConnected()){
        die(header("Location: ../index.php"));
    }

    $emailid = getUserId();

	$pdo = connectDB();
    $queryPrepared = $pdo->prepare("DELETE FROM utrackpa_newsletter WHERE emailid='$emailid';");
    $queryPrepared->execute();

    addToLogs(getUserId(),"Unsubscribed from newsletter");

        header("Location: ../templates/Home/dash-board.php");
