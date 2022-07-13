<?php
require "functions.php";

if(isAdmin()){
//Vérification de l'utilisateur
$id = $_GET["id"];

addToLogs(getUserId(),"Deleted an user : ".getUserUsernameById($id)."");

$pdo = connectDB();

// Suppression table followers followed

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_followers WHERE followed=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_followers WHERE followed=$id");
	$queryPrepared->execute();
}

// Suppression table followers followers

$queryPrepared = $pdo->prepare("SELECT id from utrackpa_followers WHERE follower=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_followers WHERE follower=$id");
	$queryPrepared->execute();
}

// Suppression table albums

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_albums WHERE 'artist'=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_albums WHERE 'artist'=$id");
	$queryPrepared->execute();
}

// Suppression table favoris_track artist

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_favoris_track WHERE artist=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_favoris_track WHERE artist=$id");
	$queryPrepared->execute();
}

// Suppression table favoris_track id_user

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_favoris_track WHERE id_user=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_favoris_track WHERE id_user=$id");
	$queryPrepared->execute();
}

// Suppression table forum

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_forum WHERE id_usr=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_forum WHERE id_usr=$id");
	$queryPrepared->execute();
}

// Suppression table requests requested

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_users_requests WHERE requestedUser=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_users_requests WHERE requestedUser=$id");
	$queryPrepared->execute();
}

// Suppression table requests requesting

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_users_requests WHERE requestingUser=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_users_requests WHERE requestingUser=$id");
	$queryPrepared->execute();
}

// Suppression table forum_comments

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_forum_comments WHERE usr_id=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_forum_comments WHERE usr_id=$id");
	$queryPrepared->execute();
}

// Suppression table newsletter

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_newsletter WHERE emailid=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_newsletter WHERE emailid=$id");
	$queryPrepared->execute();
}

// Suppression table tracks

$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_tracks WHERE artist=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_tracks WHERE artist=$id");
	$queryPrepared->execute();
}

// Suppression table users

$queryPrepared = $pdo->prepare("SELECT id from utrackpa_users WHERE id=$id");
$queryPrepared->execute();

if(!empty($queryPrepared->fetch())){
	$queryPrepared = $pdo->prepare("DELETE FROM utrackpa_users WHERE id=$id");
	$queryPrepared->execute();
}


//Si c'est le user actuellement connecté je le deco
if ($_SESSION['id'] == $id){
	header("Location: ./logout.php");
}else{
    header("Location: ../admin_page.php?display=users");
}
}else{
	if(isConnected()){
		header("Location: ../templates/Home/Home.php");
	}else{
		header("Location: ../index.php");
	}
}

