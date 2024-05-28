<?php
    require 'header.php';
    require 'bdd.php';

    $db = connexion();
    $oeuvres = getAllItems($db);

?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= htmlspecialchars($oeuvre['id']) ?>">
                <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['title']) ?>">
                <h2><?= htmlspecialchars($oeuvre['title']) ?></h2>
                <p class="description"><?= htmlspecialchars($oeuvre['artist']) ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
