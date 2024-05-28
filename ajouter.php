<?php
require 'header.php';

    session_start();

    if (isset($_SESSION['error'])){
        $errors = $_SESSION['error'];
        session_unset();
    }

?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre">
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

    <?php

    if(isset($errors)){

        foreach($errors as $error){
            echo '<p style="color:red;">' . $error . '</p>';
        }

    }


 require 'footer.php'; ?>
