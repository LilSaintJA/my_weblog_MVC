<?php
namespace Core;

/**
* Class Autoloader
* Permet de ne pas require chaque Class
*/
class Autoloader {

    /**
     * Permet de charger toutes mes Class
     */
    static function register() {
        spl_autoload_register(array(
            __CLASS__, 'autoload'
        ));
    }


    /**
     * Permet de gérer le chargement des Class
     * @param [string] $php_class [La class à charger]
     */
    static function autoload($php_class) {
        if(strpos($php_class, __NAMESPACE__ . '\\') === 0) {
            $php_class = str_replace(__NAMESPACE__ . '\\', '', $php_class);
            $php_class = str_replace('\\', '/', $php_class);
            require __DIR__ . '/' . $php_class . '.php';

        }
    }

}

?>