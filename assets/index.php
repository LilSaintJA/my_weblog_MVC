<?php
// Chargement de l'autoloader
require '../app/Autoloader.php';
App\Autoloader::register();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

ob_start();

if($p === 'home') {
    require '../pages/home.php';
} elseif($p === 'single') {
    require '../pages/single.php';
}

// Permet de stocker les require dans la variable $content
$content = ob_get_clean();
require '../pages/templates/template.php';

?>