<?php

namespace App\Controller;

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;
use Appli;

class UsersController extends AppController {

    public function login() {

        $errors = FALSE;

        if(!empty($_POST)) {
            $auth = new DBAuth(Appli::getInstance()->getDB());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=admin.articles.index');
            } else {
                $errors = TRUE;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));


    }

}

?>