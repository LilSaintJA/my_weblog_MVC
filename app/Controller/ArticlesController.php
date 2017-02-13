<?php

// Fait la jonction entre les modèles qui font les requêtes, et la vue qui affiche le résultat de la requête

namespace App\Controller;

use \Core\Controller\Controller;

class ArticlesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Article');
        $this->loadModel('Category');
    }

    /**
     * Affiche les derniers articles, et toutes les catégories
     */
    public function index() {
        $posts = $this->Article->last();
        $categories = $this->Category->all();
        // Générer un tableau pour récupérer les variables aux niveaux de la vue
        // Permet de charger la vue
        $this->render('articles.index', compact('posts', 'categories'));

    }

    /**
     * [[Description]]
     */
    public function category() {
        $categorie = $this->Category->find($_GET['id']);

        if($categorie === FALSE) {
            $this->notFound();
        }

        $article = $this->Article->lastByCat($_GET['id']);
        $categories = $this->Category->all();
        $this->render('articles.category', compact('article', 'categories', 'categorie'));
    }

    /**
     * [[Description]]
     */
    public function show() {
        $article = $this->Article->findWithCat($_GET['id']);
        $this->render('articles.show', compact('article'));
    }

}

?>