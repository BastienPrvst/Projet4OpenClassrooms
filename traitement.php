<?php
    include 'bdd.php';

    $db = connexion();

    $newOeuvreTitle = $_POST['titre'];
    $newOeuvreDescription = $_POST['description'];
    $newOeuvreArtist = $_POST['artiste'];
    $newOeuvreImage = $_POST['image'];

    //Vérification des champs

    $error = [];

    if (!isset($newOeuvreTitle)) {

        $error[] = "Veuillez saisir un titre";

    }
    if (!isset($newOeuvreArtist)){
        $error[] = "Veuillez saisir un artiste";
    }
    if (!isset($newOeuvreDescription) || mb_strlen($newOeuvreDescription) < 3) {

        if (!isset($newOeuvreDescription)){
            $error[] = "Veuillez saisir une description";
        }else{
            $error[] = "La description doit contenir au moins 3 caracteres";
        }
    }
    if (!isset($newOeuvreImage) || !filter_var($newOeuvreImage, FILTER_VALIDATE_URL)){

        if (!isset($newOeuvreImage)){
            $error[] = "Veuillez saisir une image";
        }else{
            $error[] = "L\'url de l'image n'est pas valide";
        }
    }
    //S'il y'a une erreur on renvoie au formulaire avec les erreurs
    if(!empty($error)){

        session_start();
        $_SESSION['error'] = $error;
        header('Location: ajouter.php');
        exit;
    }

    $createOeuvre = $db->prepare('INSERT INTO oeuvres(title,description,artist,image) VALUES(?,?,?,?)');

    $createOeuvre->execute([
        $newOeuvreTitle,
        $newOeuvreDescription,
        $newOeuvreArtist,
        $newOeuvreImage
    ]);

    $lastOeuvreId = $db->lastInsertId();

    $_GET=['id' => $lastOeuvreId];

    $url = sprintf(
        'oeuvre.php?id=%s',
        urldecode($lastOeuvreId)
    );

    header('Location: ' . $url);
    exit;


//https://www.garonapromotion.fr/wp-content/uploads/sites/4/2017/12/Image-test-1_large.jpg
