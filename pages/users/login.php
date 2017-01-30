<?php

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

if(!empty($_POST)) {
    $auth = new DBAuth(Appli::getInstance()->getDB());
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header('Location: admin.php');
    } else {
?>
<div class="alert alert-danger">
    <p>Identifiants incorrect</p>
</div>
<?php
    }
}

$form = new BootstrapForm($_POST);

?>


<form action="" method="post">

    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de Passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>

</form>