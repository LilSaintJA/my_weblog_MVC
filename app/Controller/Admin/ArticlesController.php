<?php

// Fait la jonction entre les modèles qui font les requêtes, et la vue qui affiche le résultat de la requête

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;
//use \Core\Auth\DBAuth;

class ArticlesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Article');
    }

    public function index() {
        $posts = $this->Article->all();
        $this->render('admin.articles.index', compact('posts'));
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Article->create([
                'titre_post' => $_POST['titre_post'],
                'content_post' => $_POST['content_post'],
                'id_cat' => $_POST['id_cat']
            ]);
            var_dump($result);
            if ($result) {
                var_dump($result);
//                die();
                return $this->index();
            }
        }

        // Récupére le contenu de l'article
        $this->loadModel('Category');
        $categories = $this->Category->liste('id', 'titre_cat');
        $form = new BootstrapForm($_POST);
        $this->render('admin.articles.edit', compact('categories', 'form'));
    }

    public function edit() {
        if (!empty($_POST)) {
            $result = $this->Article->update($_GET['id'], [
                'titre_post' => $_POST['titre_post'],
                'content_post' => $_POST['content_post'],
                'id_cat' => $_POST['id_cat']
            ]);

            if ($result) {
                return $this->index();
            }
        }

        // Récupére le contenu de l'article
        $post = $this->Article->findWithCat($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->liste('id', 'titre_cat');
        $form = new BootstrapForm($post);
        $this->render('admin.articles.edit', compact('categories', 'form'));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Article->delete($_POST['id']);
            return $this->index();
        }
    }

}

?>