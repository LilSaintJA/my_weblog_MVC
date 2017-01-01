<?php
namespace App\Tables;

use App\Appli;

/**
* Class Categories
* Permet de lister toutes les catégories des articles
*/
class Categories {

    private static $table = 'categories';

    /**
     * Liste toutes les catégories des articles
     * @return object PDO Exécute une requête SQL
     */
    public static function all() {
        $req = "SELECT * FROM " . self::$table . "";
        return Appli::getDB()->query($req, __CLASS__);
    }

}

?>