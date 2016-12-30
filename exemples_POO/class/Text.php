<?php
namespace Weblog_MVC;

class Text {

    private static $suffix = " €";
    const SUFFIX = " €";


    public static function withZero($chiffre) {
        if($chiffre <10) {
            return '0' . $chiffre . self::SUFFIX;
        } else {
            return $chiffre . self::SUFFIX;
        }
    } 
}

?>