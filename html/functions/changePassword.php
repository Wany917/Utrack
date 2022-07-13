<?php

require 'functions.php';

$pwd = htmlspecialchars($_POST["pwd"]);
$pwdConfirm = htmlspecialchars($_POST["confirmpwd"]);
$userMail = $_GET['mail'];

$pwd = trim($pwd);
$pwdConfirm = trim($pwdConfirm);

$errors = [];

//Mot de passe : Min 8, Maj, Min et chiffre
if(strlen($pwd) < 8 ||
preg_match("#\d#", $pwd)==0 ||
preg_match("#[a-z]#", $pwd)==0 ||
preg_match("#[A-Z]#", $pwd)==0 
) {
	$errors[] = "Password must be at least 8 characters long with at least a capital letter and a number";
}


//Confirmation : égalité
if( $pwd != $pwdConfirm){
	$errors[] = "Passwords does not match";
}

if(count($errors) != 0){
	$_SESSION['errors'] = $errors;
	header("Location: passwordRecover.php");
	
}else {

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("UPDATE utrackpa_users SET pwd=:pwd WHERE email=:email");

    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $queryPrepared->execute(
        [
        "pwd" => $pwd,
        "email" => $userMail
        ]
    );

    $_SESSION['confirm'] = "Password had been changed successfully";

    unset($_POST['pwd']);
	unset($_POST['confirmpwd']);

    header("Location: ../LR_SESSIONS/signIn.php");

}
























?>