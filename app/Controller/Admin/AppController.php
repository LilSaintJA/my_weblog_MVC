<?php

// Fait la jonction entre les modèles qui font les requêtes, et la vue qui affiche le résultat de la requête

namespace App\Controller\Admin;

use \Appli;
use \Core\Auth\DBAuth;

// AppController de l'Admin hérite de AppController principal
class AppController extends \App\Controller\AppController {

    public function __construct() {
        parent::__construct();
        
        $app = Appli::getInstance();
        $auth = new DBAuth($app->getDB());

        if (!$auth->logged()) {
            $this->forbidden();
        }
    }
}

?>