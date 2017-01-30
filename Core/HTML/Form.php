<?php

namespace Core\HTML;

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
        if(is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : NULL;

        // Ternaire
        // return isset($this->data[$index]) ? $this->data[$index] : NULL;
    }


    /**
     * Method qui génére les inputs
     * @param  [string] $name           [[Description]]
     * @param  [string] $label          [[Description]]
     * @param  [array] [$options = []] [[Description]]
     * @return [string] [[Description]]
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">'
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