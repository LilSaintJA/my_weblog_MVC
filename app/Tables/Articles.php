<?php
namespace App\Tables;

use App\Appli;

/**
* Class fille Articles qui hérite de la class parente Table
* Permet de gérer l'affichage des articles
*/
class Articles extends Table {

    protected static $table = 'articles';

    /**
     * Permet de lister toutes les catégories
     * @param  [string || Integer] $id [Correspond à l'id de la catégorie]
     * @return {methode} [Une requête préparé]
     */
    public static function find($id) {
        $req = "SELECT id_post, titre_post, content_post, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id_cat
        WHERE articles.id_post = ?";
        return self::query($req, [$id], TRUE);
    }

    /**
    * Permet de faire une requête à la BDD -> Récupère les derniers articles
    * @param void 
    * @return {function} Retourne la fonction static query de la class Articles 
    */
    public static function getLast() {
        $req = "SELECT id_post, titre_post, content_post, categories.titre_cat 
        FROM articles 
        LEFT JOIN categories ON articles.id_cat = categories.id_cat";
        return self::query($req);
    }

    /**
     * Permet de lister tout les articles d'une catégorie
     * @param  [string || Integer] $id_cat [[Description]]
     * @return [statement] Retourne le jeu de résultat trouvé par query
     */
    public static function lastByCat($id_cat) {
        $req = "SELECT * FROM articles LEFT JOIN categories ON articles.id_cat = categories.id_cat WHERE articles.id_cat = ?";
        return self::query($req, [$id_cat]);
    }

    /**
    * Permet de retourner l'url
    * @param void 
    */
    public function getUrl() {
        return 'index.php?p=article&id_post=' . $this->id_post;
    }

    /**
    * Permet de retourner un extrait de l'article
    * @param void 
    */
    public function getExtrait() {
        $html = '<p>' . substr($this->content_post, 0, 255) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</p></a>';

        return $html;
    }
}
//<!--
//public function __get($key) {
//// $method appelle la méthode getUrl
//$method = 'get' . ucfirst($key);
//// Permet de ne pas appeler la clef sur l'instance en permanence
//// $method() appelle directement la méthode
//$this->$key = $this->$method(); 
//$this->$key = Variable d'instance
//$this->method() = retour de la méthode
//return $this->$key;
//}-->

?>
