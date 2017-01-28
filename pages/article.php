<!-- Page Article -->
<?php

use App\Tables\Articles;

$article = Articles::find($_GET['id_post']);

if($article === FALSE) {
    \App\Appli::notFound();
}
?>

<h1><?= $article->titre_post; ?></h1>

<p><?= $article->content_post; ?></p>