<?php
namespace App\Tables;

use App\Appli;

/**
* Class Articles
* Permet de gérer l'affichage des articles
*/
class Articles {
    
    public static function getLast() {
        $req = "SELECT * FROM billet";
        return Appli::getDB()->query($req, __CLASS__);
    }

    /**
    * Permet d'appeler un propriétes qui n'existe pas en appelant sa méthode
    * @param {string} 
    */
    public function __get($key) {
        //        var_dump('Method magique __get called');
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;

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
