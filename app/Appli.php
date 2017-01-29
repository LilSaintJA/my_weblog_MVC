<?php
namespace App;
use \App\Database\MysqlDatabase;

/**
* Class Appli 
* Factory
* Permet de sauvegarder les configurations à la BDD
*/
class Appli {

    public $title = 'Mon super site';
    private $db_instance;
    private static $_instance;

    /**
     * Instancie l'objet
     * @return [object] [Retourne une instance de l'objet]
     */
    public static function getInstance() {
        // Permet d'instancier l'object qu'une seule fois
        if (is_null(self::$_instance)) {
            return self::$_instance = New Appli();
        }

        return self::$_instance;
    }

    // *** Systéme de Factory

    /**
     * Récupére le nom de la table
     * @param  [string] $name [Le nom de la class lors de l'initialisation de l'objet]
     * @return [string] [Retourne le nom de la class sans le namespace]
     */
    public function getTable($name) {
        $class_name = '\\App\\Tables\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDB());
    }

    /**
     * Retourne une instance de la BDD
     * @return [object] [Retourne une instance de la class Database]
     */
    public function getDB() {
        $config = Config::getInstance();
        if (is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }
}

?>