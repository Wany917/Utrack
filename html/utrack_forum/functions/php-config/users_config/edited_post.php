<?php require_once 'get_post_info.php';

if(isset($_POST['modified'])){
    if(!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['sub_category']) && !empty($_POST['content'])){
        $uploadTitle = htmlspecialchars($_POST['title']);
        $uploadContent = nl2br(htmlspecialchars($_POST['content']));

        $uploadCategory = $_POST['category'];
        $uploadSubCategory = $_POST['sub_category'];

        $queryPrepared = $pdo->prepare("UPDATE utrackpa_forum SET title = ?, category = ?, sub_category = ?, content = ? WHERE id = ?");
        $queryPrepared->execute(array($uploadTitle,$uploadCategory,$uploadSubCategory,$uploadContent,$idPost));

        $successMsg = '
                <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                                Modified !
                            <a class="text-decoration-none fw-lighter" href="../../../main/my_post.php">See</a>
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>';
            
                header("Location: ../../../main/my_post.php");
    }else{
        echo '<div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
					        <div class="d-flex">
                                <div class="toast-body">
                                    Fill in all the fields! !
                                </div>
						        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
					        </div>
				        </div>';
    }
}