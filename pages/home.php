<!-- Page Home -->
<div class="row">
    <div class="col-sm-8">
        <?php
        $reponse = \App\Tables\Articles::getLast();
        foreach($reponse as $post):?>

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
