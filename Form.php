<?php

class Form {

    private $data;
    public $paragraphe = 'p';

    public function __construct($data) {
        $this->data = $data;
    }

    // fonction privée qui prend en paramètre le contenu html, et qui n'est dispo que dans ma classe
    private function surround($html) {
        // Les {} sont nécessaires pour que le code soit interprété par les doubles ""
        return "<{$this->surround}>$html</{$this->surround}>";
        
    }

    public function input($name) {
        return $this->surround('<input type="text" name="' . $name . '">');
    }

    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}

?>