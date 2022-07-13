<?php

$pdo = connectDB();
$id_post = $_GET['id'];
if(isset($_GET['id']) && !empty($_GET['id'])){
    $postId = $_GET['id'];

    $checkExistPost = $pdo->prepare('SELECT id, id_usr, author, title, category, sub_category, content, dateOfRelease FROM utrackpa_forum WHERE id = ?');
    $checkExistPost->execute(array($postId));

    if($checkExistPost->rowCount() > 0){
        $infoPost = $checkExistPost->fetch();
            
            $post_id_author = $infoPost["id_usr"];
            $post_author = $infoPost["author"];
            $post_title = $infoPost["title"];
            $post_category = $infoPost["category"];
            $post_sub_category = $infoPost["sub_category"];
            $post_content = $infoPost["content"];
            $post_date_of_release = $infoPost["dateOfRelease"];

    }else{
        $errors = '<div class="d-flex justify-content-center">
        <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
        <div class="toast-body">
        <div class="ms-5 ps-2">
            No post found..
            <a class="btn btn-outline-secondary btn-sm fw-lighter ms-4" type="button"  href="../../../main/forum.php">
            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            return forum
            </a>
        </div>
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        </div>
        </div>
        ';
    }
}else{
    $errors = '<div class="d-flex justify-content-center">
    <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
    <div class="toast-body">
    <div class="ms-5 ps-2">
        No post found..
        <a class="btn btn-outline-secondary btn-sm fw-lighter ms-4" type="button"  href="../../../main/forum.php">
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        return forum
        </a>
    </div>
    </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    </div>
    </div>
    ';
}

