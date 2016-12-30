<?php

class Autoloader {

    static function register() {
        spl_autoload_register(array(
            __CLASS__, 'autoload'
        ));
    }

    static function autoload($php_class_name) {
        require 'class/' . $php_class_name . '.php';
    }

}

?>