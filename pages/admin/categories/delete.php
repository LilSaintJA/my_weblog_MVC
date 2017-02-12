<?php

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

$postTable = Appli::getInstance()->getTable('Category');

if (!empty($_POST)) {
    $result = $postTable->delete($_POST['id']);
    header('Location: admin.php?p=categories.index');
}