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
     * @return {static::var} Retourne le nom de la table
     */
    private static function getTable() {
        if(static::$table === NULL) {
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name));
        }
        return static::$table;
    }

    /**
     * Permet de lister toutes les catégories
     * @param  $_GET $id Correspond à l'id de la catégorie
     * @return {function} Retourne la fonction static getDB de la class Appli
     */
    public static function find($id) {
        $req = "SELECT * FROM " . static::getTable() . " WHERE id_cat = ?";
        return Appli::getDB()->prepare($req, [$id], get_called_class(), TRUE);
    }

    /**
     * Permet de faire une requête SQL
     * @param  SQL      $statement           Contient la requête SQL
     * @param  [[Type]] [$attributes = NULL] [[Description]]
     * @param  [[Type]] [$one = FALSE]       [[Description]]
     * @return {function} Retourne la fonction static getDB de la class Appli
     */
    public static function query ($statement, $attributes = NULL, $one = FALSE) {
        if($attributes) {
            return Appli::getDB()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return Appli::getDB()->query($statement, get_called_class(), $one);
        }
    }

    /**
     * Sélectionne tout dans une table
     * @return {object PDO} Retourne le query de PDO
     */
    public static function all() {
        $req = "SELECT * FROM " . static::getTable() . "";
        return Appli::getDB()->query($req, get_called_class());
    }

    /**
    * Méthode magique permettant d'appeler la méthode url
    * @param {string} 
    * @return {instance->object} 
    */
    public function __get($key) {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;

    }
}

//get_called_class(); // Permet d'appeler la classe qui est appelé
//explode('\\', get_called_class()) // Sépare tous les noms après les \\
//end($class_name); // Récupère le dernier nom de la classe
//static::$table // Fait bien référence à la table qui est appelé
?>
