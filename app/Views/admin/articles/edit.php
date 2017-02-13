<?php if($errors): ?>
<div class="alert alert-success">L'article à bien été modifié</div>
<?php endif; ?>

<form action="" method="post">

    <?= $form->input('titre_post', 'Titre de l\'article'); ?>
    <?= $form->input('content_post', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('id_cat', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>

</form>