<?php 

$pdo = connectDB();
$id_post = $_GET['id'];

$getAllComments = $pdo->prepare('SELECT usr_id, username, id_post, comment, dateInserted FROM utrackpa_forum_comments WHERE id_post = ? ORDER BY dateInserted DESC');
$getAllComments->execute(array($id_post));

