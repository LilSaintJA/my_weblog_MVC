<?php

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

$postTable = Appli::getInstance()->getTable('Category');

if (!empty($_POST)) {
    $result = $postTable->create([
        'titre_cat' => $_POST['titre_cat'],
    ]);

    if ($result) {
        header('Location: admin.php?p=categories.index');
    }
}

// Récupére le contenu de l'article
//$categories = Appli::getInstance()->getTable('Category')->liste('id', 'titre_cat');
$form = new BootstrapForm($_POST);

?>


<form action="" method="post">

    <?= $form->input('titre_cat', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>

</form>