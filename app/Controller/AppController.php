<?php

// Fait la jonction entre les modèles qui font les requêtes, et la vue qui affiche le résultat de la requête

namespace App\Controller;

use \Core\Controller\Controller;

use \Appli;

class AppController extends Controller {

    protected $template = 'template';

    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($modelName) {
        $this->$modelName = Appli::getInstance()->getTable($modelName);
    }

    /**
     * Gère si le visiteurs n'est pas co
     */
    protected function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit aux utilisateurs non authentifié');
    }

    /**
     * Gére la page 404
     */
    protected function notFound() {
        header("HTTP/1.0 404 Not Found");
        die('Page introuvable');
    }
}

?>