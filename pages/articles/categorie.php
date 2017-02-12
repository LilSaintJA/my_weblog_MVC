<?php

$app = Appli::getInstance();
$categorie = $app->getTable('Category')->find($_GET['id']);

if($categorie === FALSE) {
    $app->notFound();
}

$articles = $app->getTable('Article')->lastByCat($_GET['id']);
$categories = $app->getTable('Category')->all();

// Change le titre de l'onglet par rapport au titre de la catégorie
$app->title = $categorie->titre_cat;
?>

<!-- Page Categories -->
<h1><?= $categorie->titre_cat ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php
    foreach($articles as $post):?>

        <a href="<?= $post->url; ?>"><h2><?= $post->titre_post; ?></h2></a>
        <span><?= $post->titre_cat; ?></span>
        <p>
            <?= $post->getExtrait(); ?>
        </p>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach($categories as $categorie): ?>
            <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre_cat; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
