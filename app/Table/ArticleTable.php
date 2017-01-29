<?php

namespace App\Table;
use Core\Table\Table;

class ArticleTable extends Table {

    /**
     * Récupére un article en liant la categorie associé
     * @return array
     */
    public function last() {
        $req = "SELECT id, titre_post, content_post, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id_cat ORDER BY date DESC";
        return $this->query($req);
    }

    /**
     * Récupère un article en liant la catégorie associé
     * @param  [int] $id [ID récupèrer par le $_GET]
     * @return [object] [Une requête préparer] \App\Entity\ArticleEntity
     */
    public function find($id) {
        $req = "SELECT id, titre_post, content_post, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id_cat
        WHERE articles.id = ?";
        return $this->query($req, [$id], TRUE);
    }

    /**
     * Permet de lister tout les articles d'une catégorie
     * @param  [string || Integer] $id_cat [[Description]]
     * @return [array ] Retourne le jeu de résultat trouvé par query
     */
    public function lastByCat($id_cat) {
        $req = "SELECT id, titre_post, content_post, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id_cat
        WHERE articles.id_cat = ? ORDER BY date ASC";
        return $this->query($req, [$id_cat]);
    }
}

?>