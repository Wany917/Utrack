<?php
require 'functions.php';


if(isConnected()){
    
    $track_id = $_GET['id'];
    $userId = getUserId();
    $artist = getTrackArtistById($track_id);
    $source = $_GET['source'];

    $errors = [];
    if(!isset($_GET['id']) && !isset($_GET['user'])){
        $errors[] = "No track to add in your list";
        $_SESSION['errors'] = $errors;

        switch($source){
            case "user":
                header("Location: ../templates/Home/user.php?user=$userId");
            break;
            case "dashboard":
                header("Location: ../templates/Home/dash-board.php");
            break;
        }

    }else{

        

        // VERIF SI LA TRACK EXIST EN BDD
        $pdo = connectDB();
        $queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_tracks WHERE id=:id");
        $queryPrepared->execute(["id" => $track_id]);

        if (!empty($queryPrepared->fetch())) { 
            //VERIF SI L'USER LA POSSÈDE DÉJÀ EN FAV TRACK 
            $queryPrepared = $pdo->prepare("SELECT trackName FROM utrackpa_favoris_track WHERE trackName=:trackName AND id_user=:id_user");
            $queryPrepared->execute(["id_user"=>$userId,"trackName"=>$track_id]);
        

        if(!empty($queryPrepared->fetch())){
            $queryPrepared = $pdo->prepare("DELETE FROM utrackpa_favoris_track WHERE id_user=:id_user AND trackName=:trackName");
            $query = $queryPrepared->execute(
            [
                "trackName" => $track_id,
                "id_user" => $userId
            ]);
            switch($source){
                case "user":
                    header('Location: ../templates/Home/user.php?user='.$artist.'');
                break;
                case "dashboard":
                    header("Location: ../templates/Home/dash-board.php");
                break;
            }
        }else{
            $errors[] = "You have already track in you track list";
            switch($source){
                case "user":
                    header('Location: ../templates/Home/user.php?user='.$artist.'');
                break;
                case "dashboard":
                    header("Location: ../templates/Home/dash-board.php");
                break;
            }
        }
        }
    }   

}else{
    header('Location: ../index.php');
}