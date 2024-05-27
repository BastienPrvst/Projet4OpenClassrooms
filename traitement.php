<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=oeuvres;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Problème avec la base de données ! ' . $e->getMessage());
}

$newOeuvreTitle = $_POST['titre'];
$newOeuvreDescription = $_POST['description'];
$newOeuvreArtiste = $_POST['artiste'];
$newOeuvreImage = $_POST['image'];


$createOeuvre = $db->prepare('INSERT INTO oeuvres(title,description,artist,image) VALUES(?,?,?,?)');

header('Location: index.php');

