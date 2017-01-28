<?php
namespace App\Tables;

use App\Appli;

/**
* Class Parent Table 
* Permet de gérer l'affichage des tables
*/
class Table {

    protected static $table;

    /**
     * Récupére et Génére dynamiquement le nom de la table
     * @return {static::var} Retourne le nom de la table
     */
    private static function getTable() {
        if(static::$table === NULL) {
            // Récupére les différents param
            // Il faut que le nom de la class soit identique aux nom de la table
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name));
        }
        return static::$table;
    }

    /**
     * Permet de faire une requête SQL
     * @param  [requête] $statement           Représente la requête préparée et executée
     * @param  [bool]   [$attributes = NULL] [Représente l'attribut]
     * @param  [bool]   [$one = FALSE]       [Si on veut récupèrer un seul attribut]
     * @return [method] [Retourne la méthode approprié à la condition]
     */
    public static function query($statement, $attributes = NULL, $one = FALSE) {
        if($attributes) {
            return Appli::getDB()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return Appli::getDB()->query($statement, get_called_class(), $one);
        }
    }

    /**
     * Permet de lister toutes les catégories
     * @param  [string || Integer] $id [Correspond à l'id de la catégorie]
     * @return {methode} [Une requête préparé]
     */
    public static function find($id) {
        $req = "SELECT * FROM " . static::$table . " WHERE id_cat = ?";
        return static::query($req, [$id], TRUE);
    }

    /**
     * Sélectionne tout dans une table
     * @param [void]
     * @return {object PDO} Retourne le result de la requête
     */
    public static function all() {
        $req = "SELECT * FROM " . static::$table . "";
        return Appli::getDB()->query($req, get_called_class());
    }

    /**
    * Méthode magique permettant d'appeler la méthode url
    * @param {string} $key
    * @return {instance->object} 
    */
    public function __get($key) {
        $method = 'get' . ucfirst($key);
        //        var_dump($method);
        //        var_dump($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}

//get_called_class(); // Permet d'appeler la classe qui est appelé
//explode('\\', get_called_class()) // Sépare tous les noms après les \\
//end($class_name); // Récupère le dernier nom de la classe
//static::$table // Fait bien référence à la table qui est appelé
?>
