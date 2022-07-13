<?php

    require 'functions.php';

    if(isConnected()){

        $errors = [];

        // Verif formulaire

        if(

            !isset($_POST['albumName']) ||
            !isset($_POST['albumType']) ||
            !isset($_FILES['albumCover'])

        ){

                $errors[] = "Missing informations for album creation";
                $_SESSION['errors'] = $errors;
                header('Location: ../templates/Home/dash-board.php');

        }else{

        // Recup données post

        $title = htmlspecialchars($_POST['albumName']);
        $albumType = htmlspecialchars($_POST['albumType']);
        $albumCover = $_FILES['albumCover'];

        $title = trim($title);
        $artist = getUserId();

        $albumName = $artist.'_'.$title;

        // Gestion fichier cover

        $maxCoverSize = 2097152;

        $coverExtension = ['jpg','png','jpeg'];

        if($albumCover['size'] < $maxCoverSize){

        $coverExtensionToUpload = strtolower(substr(strrchr($albumCover['name'], '.'),1));

            if(in_array($coverExtensionToUpload,$coverExtension)){

                $coverToUpload = $albumName.'.'.$coverExtensionToUpload;

                $coverPath = '../ressources/albums_cover/'.$coverToUpload;

            }else{
                $errors[] = "The file must be a jpg/png/jpeg file";
            }

        }else{
            $errors[] = "The file shouldn't exceed 2mb";
        }


        // Vérification unicité de l'album
            $pdo = connectDB();
            $queryPrepared = $pdo->prepare("SELECT id from utrackpa_albums WHERE artist=:artist AND title=:title");

            $queryPrepared->execute(
                [
                "artist"=>$artist,
                "title"=>$title            
                ]);
            
            if(!empty($queryPrepared->fetch())){
                $errors[] = "You already created an album with this name";
            }

        // Vérification longueur title
            if(strlen($title) > 15){
                $errors[] = "The album title shouldn't exceed 15 characters";
            }else if(strlen($title) == 0){
                $errors[] = "A title must be set for the album";
            }

        // Création fichiers et insertion BDD
            if(count($errors) != 0){

                $_SESSION['errors'] = $errors;
                header("Location: ../templates/Home/dash-board.php");

            }else{

                $coverHasBeenUploaded = move_uploaded_file($albumCover['tmp_name'],$coverPath);

                $pdo = connectDB();
                $queryprepared = $pdo->prepare("INSERT INTO utrackpa_albums(title, artist, category, img_profile) VALUES (:title, :artist, :category, :img_profile)");
                $query = $queryprepared->execute(
                [
                    "title" => $title,
                    "artist" => $artist,
                    "category" => $albumType,
                    "img_profile" => $coverToUpload
                ]
                );

                unset($_POST['title']);
                unset($_POST['albumType']);  
                unset($_FILES['albumCover']);

                addToLogs(getUserId(),"Created an album : ".$title."");

                $confirm = [];
                $confirm[] = "Your album has been successfully created";
                $_SESSION['confirm'] = $confirm;

                header('Location: ../templates/Home/dash-board.php');

            }
        
        }
            
    }else{

        unset($_POST['title']);
        unset($_POST['albumType']);
        unset($_FILES['albumCover']);

        header('Location: ../index.php');
    }

?>