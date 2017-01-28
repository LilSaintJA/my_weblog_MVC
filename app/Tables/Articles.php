<?php
namespace App\Tables;

use App\Appli;

/**
* Class Articles
* Permet de gérer l'affichage des articles
*/
class Articles extends Table {

    /**
    * Permet de faire une requête à la BDD -> Récupère les derniers articles
    * @param void 
    * @return {function} Retourne la fonction static query de la class Articles 
    */
    public static function getLast() {
        $req = "SELECT id_post, titre_post, content_post, categories.titre_cat 
        FROM billet 
        LEFT JOIN categories 
            ON billet.id_cat = categories.id_cat";
        return self::query($req);
    }

    /**
     * Permet de lister tout les articles d'une catégorie
     * @param  $_GET $id_cat ID de la catégorie
     * @return {function} Retourne la fonction static query de la class Articles
     */
    public static function lastByCat($id_cat) {
        $req = "SELECT * FROM billet LEFT JOIN categories ON billet.id_cat = categories.id_cat WHERE billet.id_cat = ?";
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
