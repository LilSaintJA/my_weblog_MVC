<?php

namespace Weblog_MVC\HTML;

/**
* Class Form
* Permet de générer un formulaire rapidement et simplement
*/
class Form {

    /**
    * @var array Données utilisées par le formulaire
    */
    protected $data;

    /**
    * @var string Tag utlisés pour entourer les champs
    */
    public $paragraphe = 'p';

    /**
    * @param array $data Données utilisés par le formulaire
    */
    public function __construct($data = []) {
        $this->data = $data;
    }

    /**
    * @param $html string Code HTML entourer
    * @param string
    */
    protected function surround($html) {
        // Les {} sont nécessaires pour que le code soit interprété par les doubles ""
        return "<{$this->paragraphe}>{$html}</{$this->paragraphe}>";

    }

    /**
    * @param $index string Index de la valeur à récupérer
    * @param string
    */
    protected function getValue($index) {
        if(isset($this->data[$index])) {
            return $this->data[$index];
        } else {
            return NULL;
        }

        // Ternaire
        // return isset($this->data[$index]) ? $this->data[$index] : NULL;
    }

    /**
    * @param $name string
    * @param string
    */
    public function input($name) {
        return $this->surround(
            '<input type="text" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    /**
    * @param $name string
    * @param string
    */
    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }

    public function resetButton() {
        return $this->surround('<button type="reset">Supprimer</button>');
    }
}

// protected function getValue($index) {
//        return $this->data[$index];
//    }
// --- $this->data = contient toutes les données passé en param de mon construct

?>