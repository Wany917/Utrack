<?php
$pdo = connectDB();
if(isset($_GET['user']) && !empty($_GET['user'])){

    $id_usr = $_GET['user'];

    $checkUsrExist = $pdo->prepare("SELECT username, img_profile, dateInserted, accountType FROM utrackpa_users WHERE id = ?");
    $checkUsrExist->execute(array($id_usr));

    if($checkUsrExist->rowCount() > 0){
        $usrInfo = $checkUsrExist->fetch();
        
        $usrName = $usrInfo['username'];
        $usrProfile = $usrInfo['img_profile'];
        $usrRegister = $usrInfo['dateInserted'];
        $usrAccountType = $usrInfo['accountType'];

        $getTrackOfUsr = $pdo->prepare('SELECT * FROM utrackpa_tracks WHERE id = ?  ORDER BY dateOfRelease DESC');
        $getTrackOfUsr->execute(array($id_usr));
    }else{
        $error = "User not found";
    }



}else {
    $error = 'User not found';
}