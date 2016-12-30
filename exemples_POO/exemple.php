<?php
namespace Weblog_MVC;

require 'class/Autoloader.php';
Autoloader::register();

$merlin = new Personnage('Merlin');
$harry = new Personnage('Harry', 'Potter');

// Notion d'héritage

$legolas = new Archer('Legolas');

$legolas->attaque($harry);

var_dump($merlin, $harry, $legolas);

?>