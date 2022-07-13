<?php
    require 'functions.php';

    $errors = [];
    $email = htmlspecialchars($_POST['email']);
    $pwd = htmlspecialchars($_POST['pwd']);

    if( !empty($_POST['email']) &&  !empty($_POST['pwd']) && count($_POST)==2 ){

     //Récupérer en bdd le mot de passe hashé pour l'email provenant du formulaire

     $pdo = connectDB();
     $queryPrepared = $pdo->prepare("SELECT * FROM utrackpa_users WHERE email=:email");
     $queryPrepared->execute(["email"=>$_POST['email']]);
     $signInResults = $queryPrepared->fetch();
 
    if(!empty($signInResults) && password_verify($pwd, $signInResults['pwd'])){
 
        $pdo = connectDB();
        $queryPrepared = $pdo->prepare("SELECT verified FROM utrackpa_users WHERE email=:email");
        $queryPrepared->execute(["email"=>$email]);
        $verified = $queryPrepared->fetch()['verified'];

        if(($verified) == 1){

            $token = createToken();
            updateToken($signInResults["id"], $token);
            //Insertion dans la session du token
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $signInResults["id"];
                $_SESSION['token'] = $token;

            addToLogs(getUserId(),"Signed In");

            header("location: ../templates/Home/Home.php");
        } else {

            $errors[] = "You must confirm your email to sign in";
            $_SESSION['errors'] = $errors;
            header("Location: ../LR_SESSIONS/signIn.php");

        }

    }else{

        $errors[] = "Incorrect login informations";
        $_SESSION['errors'] = $errors;
        header("Location: ../LR_SESSIONS/signIn.php");

    }

    }else{

    $errors[] = "Invalid form";
    $_SESSION['errors'] = $errors;
    header("Location: ../LR_SESSIONS/signIn.php");

    }

?>