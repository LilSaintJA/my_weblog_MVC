<?php

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

$postTable = Appli::getInstance()->getTable('Article');

if (!empty($_POST)) {
    $result = $postTable->create([
        'titre_post' => $_POST['titre_post'],
        'content_post' => $_POST['content_post'],
        'id_cat' => $_POST['id_cat']
    ]);

    if ($result) {
        header('Location: admin.php?p=article.edit&id=' . Appli::getInstance()->getDB()->lastInsertId());
    }
}

// Récupére le contenu de l'article
$categories = Appli::getInstance()->getTable('Category')->liste('id', 'titre_cat');
$form = new BootstrapForm($_POST);

?>


<form action="" method="post">

    <?= $form->input('titre_post', 'Titre de l\'article'); ?>
    <?= $form->input('content_post', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('id_cat', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>

</form>