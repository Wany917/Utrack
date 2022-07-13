<?php require '../../../../functions/functions.php';
$pdo = connectDB();

if(!isset($_SESSION["token"])){
    header('HTTP/1.0 403 Forbidden');
}
if (isset($_GET['id']) && !empty($_GET['id'])){
    $myPostId = $_GET['id'];
    $idUser = getUserId($pdo);

    $source = $_GET['source'];

    $checkMyPostId = $pdo->prepare('SELECT id_usr FROM utrackpa_forum WHERE id = ?');
    $checkMyPostId->execute(array($myPostId));

    if($checkMyPostId->rowCount() > 0){
        $usrPostId = $checkMyPostId->fetch();
        if($usrPostId['id_usr'] == $idUser ){
            $deletePost = $pdo->prepare('DELETE FROM utrackpa_forum WHERE id = ?');
            $deletePost->execute(array($myPostId));

            switch($source){
                case "forum":
                    header('Location: ../../../main/forum.php');
                break;
                default:
                    header('Location: ../../../main/my_post.php');
                break;
            }
        }else{
            echo 'You are not connected on your sesison !';
        }
    }else{
        echo 'no posts found';
    }
}else{
    echo 'No post found..';
}