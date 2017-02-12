<?php

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

$postTable = Appli::getInstance()->getTable('Article');

if (!empty($_POST)) {
    $result = $postTable->delete($_POST['id']);
    header('Location: admin.php');
}