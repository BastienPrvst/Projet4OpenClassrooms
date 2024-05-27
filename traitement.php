<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=artbox;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Problème avec la base de données ! ' . $e->getMessage());
}

$newOeuvreTitle = $_POST['titre'];
$newOeuvreDescription = $_POST['description'];
$newOeuvreArtist = $_POST['artiste'];
$newOeuvreImage = $_POST['image'];


$createOeuvre = $db->prepare('INSERT INTO oeuvres(title,description,artist,image) VALUES(?,?,?,?)');

$createOeuvre->execute([
    $newOeuvreTitle,
    $newOeuvreDescription,
    $newOeuvreArtist,
    $newOeuvreImage
]);

$lastOeuvreId = $db->lastInsertId();

$_GET=['id' => $lastOeuvreId];

$url = 'oeuvre.php?id=' . urlencode($lastOeuvreId);

echo $_GET['id'];

header('Location: ' . $url);
exit;


//https://www.garonapromotion.fr/wp-content/uploads/sites/4/2017/12/Image-test-1_large.jpg
