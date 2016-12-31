<?php
$req = "SELECT * FROM billet";
$reponse = $db->query($req, 'App\Tables\Articles');
foreach($reponse as $post):?>

<a href="<?= $post->url ?>"><h2><?= $post->titre_post; ?></h2></a>

<p>
    <?= $post->getExtrait(); ?>
</p>

<?php endforeach; ?>
