<?php  
$pdo = connectDB();
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $userId = $_GET['id'];

        $checkUsrExist = $pdo->prepare('SELECT * FROM utrackpa_users WHERE id = ?');
        $checkUsrExist->execute(array($userId));

        if($checkUsrExist->rowCount() > 0){
            
            $usrInfo = $checkUsrExist->fetch();

            $usrName = $usrInfo['username'];
            $usrProfile = $usrInfo['img_profile'];
            $usrRegister = $usrInfo['dateInserted'];

            $getPostOfUsr = $pdo->prepare('SELECT * FROM utrackpa_forum WHERE id_usr = ?  ORDER BY dateOfRelease DESC LIMIT 4');
            $getPostOfUsr->execute(array($userId));


        }else{
            $error = 'User not found';
        }

    }else{
        $error = 'User not found';
    }
    