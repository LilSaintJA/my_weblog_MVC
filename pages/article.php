<!-- Page Article -->
<?php

use App\Appli;
use App\Tables\Articles;
use App\Tables\Categories;

$article = Articles::find($_GET['id_post']);

if($article === FALSE) {
    Appli::notFound();
}

// Change le titre de l'onglet par rapport au titre de l'article
Appli::setTitle($article->titre_post);

?>

<h1><?= $article->titre_post; ?></h1>

<!-- Affiche le titre de la catégorie ->categorie correspond aux AS de categories.titre_cat dans la requête -->
<p><?= $article->categorie; ?></p>

<p><?= $article->content_post; ?></p>