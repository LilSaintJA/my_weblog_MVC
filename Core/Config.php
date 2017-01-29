<?php

namespace Core;

// Singleton, class instancier qu'une fois dans l'appli
// Permet de régler les problémes d'héritage et de construct des class static
class Config {

    private $settings = [];
    private static $_instance;

    /**
     * Retourne l'instance de l'objet
     * Evite d'instancier à chaque fois qu'on a besoin de l'objet
     * @param  [string] $file [Le fichier à charger]
     * @return [object] [Retourne une instance de l'objet]
     */
    public static function getInstance($file) {
        // Permet de n'avoir qu'une seule instance de l'objet
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }
    
    /**
     * Constructeur de l'objet
     * @private Initialise le fichier config.php contenant les infos de la BDD
     * @param [string] $file [Le fichier à charger lors de la construction de l'objet]
     */
    public function __construct($file) {
        $this->settings = require_once($file);
    }

    /**
     * Permet de récupérer la clef à obtenir
     * @param  [string] $key [La clef du tableau contenu dans $settings]
     * @return [string] [Retourne la clef du tableau sur l'objet ]
     */
    public function get($key) {
        if (!isset($this->settings[$key])) {
            return NULL;
        } else {
            return $this->settings[$key];
        }
    }

}


?>