<?php if ($errors): ?>
<div class="alert alert-danger">
    Identifiants incorrect
</div>
<?php endif; ?>


<form action="" method="post">

    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de Passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>

</form>