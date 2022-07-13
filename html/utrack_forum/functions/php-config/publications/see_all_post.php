<?php
$pdo = connectDB();
$getAllPosts = $pdo->query('SELECT id, id_usr, author, title, category, sub_category, content, dateOfRelease FROM utrackpa_forum ORDER BY dateOfRelease DESC');


if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = $_GET['search'];

    $getAllPosts = $pdo->query('SELECT * FROM utrackpa_forum WHERE title LIKE "%'.$search.'%" ORDER BY dateOfRelease DESC');
}£