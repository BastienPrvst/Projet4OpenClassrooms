<?php

function connexion(): PDO
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=artbox;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Problème avec la base de données ! ' . $e->getMessage());
    }

    return $db;
}

function getAllItems($db)
{
    $getOeuvres = $db -> query("SELECT * FROM oeuvres");

    return $getOeuvres->fetchAll(PDO::FETCH_ASSOC);
}

function getOneItemById($db, $idOeuvre)
{
    $getOeuvres = $db -> prepare("SELECT * FROM oeuvres WHERE id = ?");

    $getOeuvres->execute([$idOeuvre]);

    return $getOeuvres->fetch(PDO::FETCH_ASSOC);

}
