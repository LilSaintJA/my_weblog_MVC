<!-- Page Article -->
<?php
$post = App\Appli::getDB()->prepare("SELECT * FROM billet WHERE id_post = ?", [$_GET['id_post']], 'App\Tables\Articles', TRUE);
?>

<h1><?= $post->titre_post; ?></h1>

<p><?= $post->content_post; ?></p>