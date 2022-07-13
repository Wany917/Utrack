<?php

require "functions.php";

$id = $_SESSION["id"];
$source = $_GET["source"];

if(!isConnected()){
	die(header("Location: ../index.php"));
}

// Récupération des données déjà existantes en bdd
$pdo = connectDB();

$queryPrepared = $pdo->prepare("SELECT * FROM utrackpa_users WHERE id=:id");
$queryPrepared->execute(["id"=>$id]);
$user = $queryPrepared->fetch();


//récupérer les données du formulaire
$email = htmlspecialchars($_POST["email"]);
$username = htmlspecialchars($_POST["username"]);
$profilePictureUsernameId = getUserId();
$pwd = htmlspecialchars($_POST["pwd"]);
$img_profile = $_FILES["img-profile"];

//nettoyer les données

$email = strtolower(trim($email));
$username = trim($username);
$pwd = trim($pwd);

//vérifier les données
$errors = [];
$confirm = [];

//img-profile
if(isset($img_profile) && !empty($img_profile['name'])){
	$max_size = 2097152;
	$extension = array('jpeg','jpg','png');
	if($img_profile['size'] <= $max_size){
		//je renvoie l'extension de fichier en ignorant le caractère '.'
		$extensionUpload = strtolower(substr(strrchr($img_profile['name'], '.'),1));
		if(in_array($extensionUpload, $extension)){
			// Creation de chemin du fichier
			$path = "../ressources/img-profile/".$profilePictureUsernameId.".".$extensionUpload;
			//On va deplacer se fichier stocker temporairement et le placer dans path
			$result = move_uploaded_file($img_profile['tmp_name'],$path);
			if($result){
				$queryPrepared = $pdo->prepare("UPDATE utrackpa_users SET img_profile = :img_profile WHERE id =:id");
				$queryPrepared->execute(array(
					'img_profile'=>$profilePictureUsernameId.'.'.$extensionUpload,
					'id'=>$id));	
			}else{
				$error[] = "Failed import";
			}
		}
	}else{
		$errors[] = "Your profile picture should not exceed 2Mb";
	}
}

//Email OK
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	if(!empty($email)){
		$errors[] = "Email is not valid";	
	}	
}else{

	//Vérification l'unicité de l'email
	$queryPrepared = $pdo->prepare("SELECT id from utrackpa_users WHERE email=:email");

	$queryPrepared->execute(["email"=>$email]);
		
	if(!empty($queryPrepared->fetch())){
		$errors[] = "The new email can't be the same as the old";
	}else{
		$queryPrepared = $pdo->prepare("UPDATE utrackpa_users SET email=:email WHERE id=:id");
		$queryPrepared->execute(["email"=>$email,"id"=>$id]);
		$confirm[] = "Email has been modified";
	}

}

//username : Min 4 Max 60

if(strlen($username)<4 || strlen($username)>60){
	if(!empty($username)){
		$errors[] = "Username must be between 4 and 60 charaters";	
	}	
}else{

	$queryPrepared = $pdo->prepare("SELECT id from utrackpa_users WHERE username=:username");

	$queryPrepared->execute(["username"=>$username]);
		
	if(!empty($queryPrepared->fetch())){
		$errors[] = "The new username can't be the same as the old";
	}else{
		$queryPrepared = $pdo->prepare("UPDATE utrackpa_users SET username=:username WHERE id=:id");
		$queryPrepared->execute(["username"=>$username,"id"=>$id]);
		$confirm[] = "Username has been modified";
	}

}

//Mot de passe : Min 8, Maj, Min et chiffre

if(strlen($pwd) < 8 || preg_match("#\d#", $pwd)==0 && preg_match("#[a-z]#", $pwd)==0 && preg_match("#[A-Z]#", $pwd)==0){
	if(!empty($pwd)){
		$errors[] = "Password must be more than 8 characters and a capital letter";	
	}	
}else{
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);
	$queryPrepared = $pdo->prepare("UPDATE utrackpa_users SET pwd=:pwd WHERE id=:id");
	$queryPrepared->execute(["pwd"=>$pwd,"id"=>$id]);
	$confirm[] = "Password has been modified";
}



if(count($errors) == 0){

	addToLogs(getUserId(),"Edited his/her account");

	if(!empty($email)){
	$_SESSION["email"] = $email;
	}

	$_SESSION["confirm"] = $confirm;

	unset($_POST['email']);
	unset($_POST["username"]);
	unset($_POST['pwd']);

    switch($source){
        case "admin":
            header("Location: ../admin_page.php?display=users");
        break;
        case "dashboard":
            header("Location: ../templates/Home/dash-board.php");
        break;
    }

}else{

	unset($_POST['email']);
	unset($_POST["username"]);
	unset($_POST['pwd']);

    switch($source){
        case "admin":
            header("Location: ../admin_page.php?display=users");
        break;
        case "dashboard":
            header("Location: ../templates/Home/dash-board.php");
        break;
    }
}
