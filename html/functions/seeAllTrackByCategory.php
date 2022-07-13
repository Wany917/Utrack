<?php
$pdo = connectDB();

if(isset($_GET['category']) && !empty($_GET['category'])){
    $cParam = $_GET['category'];

    $checkIfCategoryExists = $pdo->prepare("SELECT * FROM utrackpa_tracks WHERE category = ? ORDER BY dateOfRelease DESC");
    $checkIfCategoryExists->execute(array($cParam));

    $categoryInfo = $checkIfCategoryExists->fetchAll();
    }