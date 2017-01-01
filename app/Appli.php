<?php
namespace App;

/**
* Class Database
* Permet de charger les configurations à la BDD
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

    public static function getDatabase() {
        if(self::$database === NULL) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);

        }
        return self::$database;
    }
}

?>