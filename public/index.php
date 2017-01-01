<!-- Index du site -->
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
} elseif($p === 'article') {
    require '../pages/single.php';
} elseif ($p === 'categorie') {
    require '../pages/categorie.php';
} elseif ($p === 'login') {
    require '../pages/login.php';
}

// Permet de stocker les require dans la variable $content
$content = ob_get_clean();
require '../pages/templates/template.php';

?>


<!--ul#mainMenu>li.items*4>{test list $}-->
<!--p*4>lorem-->