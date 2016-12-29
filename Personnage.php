<?php

class Personnage {

    public $vie;
    public $attaque;
    private $nom;
    protected $prenom;

    public function __construct($name = NULL, $life = 80, $att = 20) {
        // Initialisation du param dans l'objet courant *** Je sauvegarde mon param dans l'objet $this
        $this->nom = $name; 
        $this->vie = $life;
        $this->attaque = $att;
    }

    // """***""" GETTEURS & SETTEURS """***"""

    public function getNom() {
        return $this->nom;
    }

    public function crier() {
        echo 'LEEROY JENKINS';
    }

    public function regenerate($gain = NULL) {
        if(is_null($gain)) {
            $this->vie = 80;
        } else {
            $this->vie = $this->vie + $gain; // this fait référence à l'objet en cours.
        }
        echo 'Vis du personnage ' . $this->vie . "\n";
    }

    public function dead() {
        return $this->vie <= 0;
    }

    private function empecher_negatif() {
        if($this->vie < 0) {
            $this->vie = 0;
        }
    }

    public function attaque($cible) {
        //        $this Attaquant
        //        $cible Defenseur
        $cible->vie -= $this->attaque;
        $cible->empecher_negatif();
    }


}

// *** NB

// --- $this->vie = ($this->vie + $gain); L'objet courant vaut l'objet courant + la valeur du param lors de l'instanciation de la function

// --- Propriété private = inaccessible en dehors de la classe, doit passer par des getteurs
// --- Propriété protected = équivaut à private, mais peu être hérité
?>