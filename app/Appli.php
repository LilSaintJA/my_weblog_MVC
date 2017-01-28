<?php
namespace App;

/**
* Class Database
* Permet de sauvegarder les configurations à la BDD
*/
class Appli {

    /**
    * @const {string} Permet de récupérer les données pour la connection à la BDD
    */
    const DB_NAME = 'test_blog';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    /**
    * @var {object} Récupére les infos de connection à la BDD
    */
    private static $database;

    /**
    * @return $database {const} Retourne la connection à la BDD
    * @return $database
    */
    public static function getDB() {
        if(self::$database === NULL) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);

        }
        return self::$database;
    }
}

?>