<?php

    require 'functions.php';

    if(isConnected()){
    $emailid = getUserId();

	$pdo = connectDB();
    $queryPrepared = $pdo->prepare("INSERT INTO utrackpa_newsletter(emailid) VALUES (:emailid);");
    $queryPrepared->execute(
        [
        "emailid" => $emailid,
        ]
    );

    addToLogs(getUserId(),"Subscribed to newsletter");

        header("Location: ../templates/Home/dash-board.php");
    } else {
        header("Location: ../index.php");
    }   


?>