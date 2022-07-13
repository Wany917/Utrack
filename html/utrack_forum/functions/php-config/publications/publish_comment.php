<?php require_once '../../../../functions/functions.php';
      require 'view_one_post.php';

$pdo = connectDB();
$usr_id = getUserId($pdo);
$username = getUserUsernameById($usr_id);

if(isset($_POST['send'])){
    $id_post = $_GET['id'];

    if(!empty($_POST['comment'])){
        $usr_comment = nl2br(htmlspecialchars($_POST['comment']));

        $queryPrepare = $pdo->prepare('INSERT INTO utrackpa_forum_comments(id_post, usr_id, username, comment) VALUES (?,?,?,?)');
        $queryPrepare->execute(array($id_post,$usr_id,$username,$usr_comment));

    }
    header("Location: see_post.php?id=$id_post");
}