<?php require_once 'functions.php';
$pdo = connectDB();
$errors = [];
$confirm = [];

if (isset($_GET['userKey']) && !empty($_GET['userKey'])) 
{
    $validKey = $_GET['userKey'];
    $query=$pdo->prepare('SELECT * FROM utrackpa_users WHERE userKey=:userKey AND verified=:verified');
    $query->execute(['userKey'=>$validKey, 'verified'=>0]);

    if (!empty($query->fetch())) 
    {
        $query=$pdo->prepare('UPDATE utrackpa_users SET verified=:verified WHERE userKey=:userKey');
        $query->execute(['userKey'=>$validKey, 'verified'=>1]);
        
        $confirm[] = "Your account has been verified";
        $_SESSION['confirm'] = $confirm;
        header('Location: ../LR_SESSIONS/signIn.php');

    }
    else
    {
        $errors[] = "This account does not exist";
        $_SESSION['errors'] = $errors;
        header('Location: ../LR_SESSIONS/signIn.php');
    }
}
