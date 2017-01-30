<?php

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

$postTable = Appli::getInstance()->getTable('Article');

if (!empty($_POST)) {
    $result = $postTable->update($_GET['id'], [
        'titre_post' => $_POST['titre_post'],
        'content_post' => $_POST['content_post']
    ]);

    if ($result) {
?>
<div class="alert alert-success">L'article à bien été modifié</div>
<?php
    }
    var_dump($result);
}

// Récupére le contenu de l'article
$post = $postTable->find($_GET['id']);
$categories = Appli::getInstance()->getTable('Category')->all();
$form = new BootstrapForm($post);

?>


<form action="" method="post">

    <?= $form->input('titre_post', 'Titre de l\'article'); ?>
    <?= $form->input('content_post', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('id_cat', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>

</form>