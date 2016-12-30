<?php

require 'Personnage.php';
require 'Archer.php';

$merlin = new Personnage('Merlin');
$harry = new Personnage('Harry', 'Potter');

// Notion d'héritage

$legolas = new Archer('Legolas');

$legolas->attaque($harry);

var_dump($merlin, $harry, $legolas);

?>