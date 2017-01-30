<!-- homepage -->
<?php

$posts = Appli::getInstance()->getTable('Article')->all();

?>

<h1>Administrer les articles</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= $post->titre_post ?></td>
            <td>
            <a href="?p=article.edit&id=<?= $post->id; ?>" class="btn btn-primary">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>