<?php

/**
* Class Archer
* Permet de créer des Archers qui hérite de la class Personnage
*/
class Archer extends Personnage {

    public $arc = 3;
    public $vie = 40;

    public function __construct($nom, $vie = NULL) {
        parent::__construct($nom, $vie);
        $this->vie = $this->vie / 2;
    }

    public function attaque($cible) {
        $cible->vie -= $this->attaque;
        parent::attaque($cible);
    }
}

//class Arbaletrier extends Archer {
//    
//}

?>