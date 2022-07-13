<?php require '../../../../functions/functions.php';

    if(isset($_GET['id']) AND !empty($_GET['id'])){
    $pdo = connectDB();
    $idPost = $_GET["id"];
    $id_usr = getUserId($pdo);


    $checkPost = $pdo->prepare('SELECT * FROM utrackpa_forum WHERE id = ?');
    $checkPost->execute(array($idPost));

    if($checkPost->rowCount() > 0){
        
        $myPost = $checkPost->fetch();
        if($myPost["id_usr"] == $id_usr){
            
            $postTitle = $myPost["title"];
            $postCategory = $myPost["category"];
            $postSubCategory = $myPost["sub_category"];
            $postContent = $myPost["content"];

            $postContent = str_replace('<br />', '', $postContent);
        }else{
            $errors = 'You are not the author of the post';
        }

    }else{
        $errors ='No post to modify';
    }

}else{
    $errors = "No post were found";
    }