<?php

getAllTracks();

$hint = "";

if(isset($_GET['search'])){

    $q = $_REQUEST["search"];



if($q !== ""){
    $q = strtolower($q);
    $length = strlen($q);
    foreach(getAllTracks() as  $track){
        
        $artist = $track['artist'];
        $title = $track['title'];
        $category = $track['category'];
        $dateOfRelease = $track['dateOfRelease'];
        $imgProfile = $track['img_profile'];
        $id_track = $track['id'];
        $trackName = $track['trackName'];

        if(stristr($q, substr($title, 0, $length))){ 
            if($hint === ""){
                $hint = '<div class="show toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="../../ressources/IMAGES-HEADER/icon.png" class="rounded me-2" width="25">
                        <strong class="me-auto">Utrack</strong>
                    <small>'.$dateOfRelease.'</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <div class="d-flex justify-content-between">
                        <a data-bs-toggle="modal" data-bs-target="#listenModal'.$id_track.'">
                            <img src="../../ressources/tracks_cover/'.$imgProfile.'" class="rounded" style="width: 50px; height: 50px" ">                         
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#listenModal'.$id_track.'">
                            <p class="d-flex align-items-center mt-3">
                            '.$title.'
                            </p><br>
                        <a>
                    </div>
                    <p class="text-end">'.$category.'</p>
                </div>
            </div>
            
            <!-- Modal -->
        <div class="modal fade" id="listenModal'.$id_track.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listenModal'.$id_track.'">'.$title.'</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modalAudio">
                    <audio id="playerAudio" oncontextmenu="return false;" controlslist="nodownload" controls src="../../ressources/tracks/'.$trackName.'"></audio>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>';
            } else {
                //$hint .= ", $title";
            }
        }
    }
}
}
?>