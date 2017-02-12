<?php

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

$postTable = Appli::getInstance()->getTable('Category');

if (!empty($_POST)) {
    $result = $postTable->update($_GET['id'], [
        'titre_cat' => $_POST['titre_cat']
    ]);

    if ($result) {
?>
<div class="alert alert-success">La catégorie à bien été modifié</div>
<?php
    }
}

// Récupére le contenu de l'article
$post = $postTable->find($_GET['id']);
//var_dump($post);
$form = new BootstrapForm($post);

?>


<form action="" method="post">

    <?= $form->input('titre_cat', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>

</form>