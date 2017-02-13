<!-- Page Home -->
<div class="row">
    <div class="col-sm-8">
        <?php
        // Liste les derniers articles se trouvant dans le Controller ArticleController
        foreach($posts as $post):?>
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
            foreach($categories as $categorie): ?>
            <li>
                <a href="<?= $categorie->url; ?>"><?= $categorie->titre_cat; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
