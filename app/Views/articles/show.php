<!-- Page Article -->
<?php

// Change le titre de l'onglet par rapport au titre de l'article
$app->title = $article->titre_post;

?>

<h1><?= $article->titre_post; ?></h1>

<!-- Affiche le titre de la catégorie ->categorie correspond aux AS de categories.titre_cat dans la requête -->
<p><?= $article->titre_cat; ?></p>

<p><?= $article->content_post; ?></p>