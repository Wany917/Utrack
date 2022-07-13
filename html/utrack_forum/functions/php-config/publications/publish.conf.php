<?php 
if (isset($_POST['submit'])){
	
    if(!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['content']) && !empty($_POST['sub_category'])){
        $pdo = connectDB();

        $title = htmlspecialchars($_POST['title']);
        $category = $_POST['category'];
        $sub_category= $_POST['sub_category'];
        $content = nl2br(htmlspecialchars($_POST['content']));

        //$datePosted = date('d/m/Y');
        $usrId = getUserId($pdo);
        $author = getUserUsernameById($usrId);

        $queryPrepared = $pdo->prepare("INSERT INTO utrackpa_forum(id_usr, author, title, category, sub_category, content) VALUES (?, ?, ?, ?, ?, ?)");
    
        $query = $queryPrepared->execute(array($usrId, $author, $title, $category, $sub_category, $content));  

        $successMsg = '
            <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Posted !
                        <a class="text-decoration-none fw-lighter" href="../main/my_post.php">See</a>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>';
    }else{
        $errors = '<div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            Please fill in all fields !
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>';
    }
    
}