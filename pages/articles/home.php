<!-- Page Home -->
<div class="row">
    <div class="col-sm-8">
        <?php
        // Récupère les derniers articles charger par la class Articles
        $reponse = Appli::getInstance()->getTable('Article')->last();

        // Liste les derniers articles
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
            <?php 
            $reponses = Appli::getInstance()->getTable('Category')->all();
            foreach($reponses as $categories): ?>
            <li><a href="<?= $categories->url; ?>"><?= $categories->titre_cat; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
