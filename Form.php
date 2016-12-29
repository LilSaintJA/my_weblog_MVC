<?php

class Form {

    private $data;
    public $paragraphe = 'p';

    public function __construct($data = []) {
        $this->data = $data;
    }

    // fonction privée qui prend en paramètre le contenu html, et qui n'est dispo que dans ma classe
    private function surround($html) {
        // Les {} sont nécessaires pour que le code soit interprété par les doubles ""
        return "<{$this->paragraphe}>{$html}</{$this->paragraphe}>";

    }

    // """***""" GETTEURS """***"""

    private function getValue($index) {
        if(isset($this->data[$index])) {
            return $this->data[$index];
        } else {
            return NULL;
        }

        // Ternaire
        // return isset($this->data[$index]) ? $this->data[$index] : NULL;
    }

    public function input($name) {
        return $this->surround(
            '<input type="text" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}

// private function getValue($index) {
//        return $this->data[$index];
//    }
// --- $this->data = contient toutes les données passé en param de mon construct

?>