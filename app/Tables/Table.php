<?php
namespace App\Tables;

use App\Appli;

/**
* Class Table
* Permet de gérer l'affichage des articles
*/
class Table {

    protected static $table;

    /**
     * Génére dynamiquement le nom de la table
     * @return {self::var} Retourne le nom de la table
     */
    private static function getTable() {
        if(self::$table === NULL) {
            self::$table = __CLASS__;
        }
        return self::$table;
    }


    /**
     * Sélectionne tout dans une table
     * @return {object PDO} Retourne le query de PDO
     */
    public static function all() {
        $req = "SELECT * FROM " . self::$table . "";
        return Appli::getDB()->query($req, __CLASS__);
    }

    /**
    * Méthode magique permettant d'appeler la méthode url
    * @param {string} 
    * @return {instance->object} 
    */
    public function __get($key) {
        //        var_dump('Method magique __get called');
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;

    }
}

?>
