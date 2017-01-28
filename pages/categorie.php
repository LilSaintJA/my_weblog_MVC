<?php

use \App\Tables\Categories;
use App\Tables\Articles;

$categorie = Categories::find($_GET['id_cat']);

if($categorie === FALSE) {
    \App\Appli::notFound();
}

$articles = Articles::lastByCat($_GET['id_cat']);
$categories = Categories::all();
?>

<!-- Page Categories -->
<h1><?= $categorie->titre_cat ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php
    foreach($articles as $post):?>

        <a href="<?= $post->url ?>"><h2><?= $post->titre_post; ?></h2></a>
        <span><?= $post->titre_cat ?></span>
        <p>
            <?= $post->getExtrait(); ?>
        </p>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach(App\Tables\Categories::all() as $categories): ?>
            <li><a href="<?= $categories->url; ?>"><?= $categories->titre_cat; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
