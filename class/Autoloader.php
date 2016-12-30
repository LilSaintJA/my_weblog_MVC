<?php

namespace Weblog_MVC;

/**
* Class Autoloader
* Permet de ne pas require chaque Class
*/
class Autoloader {

    /**
    * @param void Permet de charger toutes mes Class
    * @param void
    */
    static function register() {
        spl_autoload_register(array(
            __CLASS__, 'autoload'
        ));
    }

    /**
    * @param $Class string Permet de gérer le chargement des Class
    * @param string
    */
    static function autoload($php_class) {
        $php_class = str_replace('Weblog_MVC\\','', $php_class);
        $php_class = str_replace('\\', '/', $php_class);
        require 'class/' . $php_class . '.php';
    }

}

?>