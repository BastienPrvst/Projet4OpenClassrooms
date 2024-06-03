<?php
require 'header.php';
require 'bdd.php';

    $db = connexion();

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
    }

    $oeuvre = getOneItemById($db, $_GET['id']);

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['title']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre['title']) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre['artist']) ?></p>
        <p class="description-complete">
             <?= htmlspecialchars($oeuvre['description']) ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
