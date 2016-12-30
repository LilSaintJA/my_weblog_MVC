<?php

/**
* Class Personnage
* Permet de créer un personnage
*/
class Personnage {

    /**
    * @const int Défint le mximum de la vie du perso
    */
    const MAX_VIE = 100;


    /**
    * @var string Définit l'identité du perso et ces attributs
    */
    protected $prenom;
    protected $nom;
    protected $vie;
    protected $attaque;

    /**
    * @param string|int Données utilisées par le personnage
    */
    public function __construct($prenom = NULL, $name = NULL, $life = 80, $att = 20) {
        // Initialisation du param dans l'objet courant *** Je sauvegarde mon param dans l'objet $this
        $this->prenom = $prenom;
        $this->nom = $name; 
        $this->vie = $life;
        $this->attaque = $att;
    }

    /**
    * @param string Nom du personnage
    * @param string
    */
    public function getNom() {
        return $this->nom;
    }

    /**
    * @param string Nom du personnage
    * @param string
    */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
    * @param int Vie du personnage
    * @param int
    */
    public function getVie() {
        return $this->vie;
    }

    /**
    * @param string Nom du personnage
    * @param string
    */
    public function getAttaque() {
        return $this->attaque;
    }

    public function crier() {
        echo 'LEEROY JENKINS';
    }

    public function regenerate($gain = NULL) {
        if(is_null($gain)) {
            $this->vie = self::MAX_VIE;
        } else {
            $this->vie = $this->vie + $gain; // this fait référence à l'objet en cours.
        }
        echo 'Vis du personnage ' . $this->vie . "\n";
    }

    public function dead() {
        return $this->vie <= 0;
    }

    protected function empecher_negatif() {
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

// --- Les Getteurs et Setteurs
// *** Les getteurs récupére l'information
// *** Les setteurs permettent de changer l'information de la propriété, sans manipuler la variable en elle même
?>