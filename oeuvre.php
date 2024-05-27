<?php
    require 'header.php';

    try {
        $db = new PDO('mysql:host=localhost;dbname=artbox;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Problème avec la base de données ! ' . $e->getMessage());
    }

    $getOeuvres = $db -> query("SELECT * FROM oeuvres");

    $oeuvres = $getOeuvres->fetchAll(PDO::FETCH_ASSOC);

//    echo '<pre>';
//    print_r($oeuvres);
//    echo '</pre>';

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        echo 'No id???';
    }

    $oeuvre = null;

    // On parcourt les oeuvres du tableau afin de rechercher celle qui a l'id précisé dans l'URL
    foreach($oeuvres as $o) {
        // intval permet de transformer l'id de l'URL en un nombre (exemple : "2" devient 2)
        if($o['id'] === intval($_GET['id'])) {
            $oeuvre = $o;
            break; // On stoppe le foreach si on a trouvé l'oeuvre
        }
    }

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvre)) {
        echo 'Aucune oeuvre avec l\'id ' . $_GET['id'] . ' n\'a été trouvé.';
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['title'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['title'] ?></h1>
        <p class="description"><?= $oeuvre['artist'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
