<?php

require 'Personnage.php';

$merlin = new Personnage("Merlin");
// -----------------------------
// Harry est différent de $merlin
$harry = new Personnage("Harry");
// -----------------------------
echo $merlin->getNom();

?>