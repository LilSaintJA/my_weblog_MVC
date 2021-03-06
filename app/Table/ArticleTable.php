<?php

namespace App\Table;
use Core\Table\Table;

class ArticleTable extends Table {

    /**
     * Récupére un article en liant la categorie associé
     * @return array
     */
    public function last() {
        $req = "SELECT articles.id, titre_post, content_post, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id ORDER BY date DESC";
        return $this->query($req);
    }

    /**
     * Récupère un article en liant la catégorie associé
     * @param  [int] $id [ID récupèrer par le $_GET]
     * @return [object] [Une requête préparer] \App\Entity\ArticleEntitygit 
     */
    public function findWithCat($id) {
        $req = "SELECT articles.id, titre_post, content_post, articles.id_cat, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id
        WHERE articles.id = ?";
        return $this->query($req, [$id], TRUE);
    }

    /**
     * Permet de lister tout les articles d'une catégorie
     * @param  [string || Integer] $id_cat [[Description]]
     * @return [array ] Retourne le jeu de résultat trouvé par query
     */
    public function lastByCat($id_cat) {
        $req = "SELECT articles.id, titre_post, content_post, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id
        WHERE articles.id_cat = ? ORDER BY date ASC";
        return $this->query($req, [$id_cat]);
    }
}

?>