<?php
namespace App\Tables;

use App\Appli;

/**
* Class Articles
* Permet de gérer l'affichage des articles
*/
class Articles extends Table {
    
    /**
    * Permet de faire une requête à la BDD
    * @param void 
    * @return {class} 
    */
    public static function getLast() {
        $req = "SELECT * FROM billet LEFT JOIN categories ON billet.id_cat = categories.id_cat";
        return Appli::getDB()->query($req, __CLASS__);
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
