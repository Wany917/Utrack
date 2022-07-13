<?php


$pdo = connectDB();

if(!isConnected($pdo)){

    header("Location: ../../index.php");

}

//get user all post
function getAllPosts(){
	
	$pdo = connectDB();
	//$user_id = getUserId($pdo);
	
	$queryPrepared = $pdo->prepare("SELECT * FROM utrackpa_forum ORDER BY id DESC");	
	$queryPrepared->execute();
	
	return $queryPrepared->fetchAll();

	$errors = 'No posts found';
}
// get All User Posts
function getAllUserPosts(){
	$pdo = connectDB();
	$iduser = getUserId($pdo);

	$queryPrepared = $pdo->prepare("SELECT * FROM utrackpa_forum WHERE id_usr = ? ORDER BY dateOfRelease DESC");
	$queryPrepared->execute(array($iduser));
	
	return $queryPrepared->fetchAll();
}
function getPostId($id){
	$pdo = connectDB();

	$queryPrepared = $pdo->prepare("SELECT id FROM utrackpa_forum WHERE id=:id");
	$queryPrepared->execute(["id"=>$id]);

	return $queryPrepared->fetch()[0];
}

//All comments 
function getAllComments($id_post){
	$pdo = connectDB();

	$getAllComments = $pdo->prepare('SELECT * FROM utrackpa_forum_comments WHERE id_post =:id_post ORDER BY dateInserted DESC');
	$getAllComments->execute(["id_post"=>$id_post]);

	return $getAllComments->fetchAll();
}
