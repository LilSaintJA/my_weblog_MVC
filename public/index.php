<!-- Index du site -->
<?php
define('ROOT', dirname(__DIR__));
require_once(ROOT . '/app/Appli.php');

// Permet de charger l'autoloader depuis Appli
Appli::load();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'articles.index';
}
// Permet de séparer l'url, d'un côté le controller de l'autre la view
$p = explode('.', $p);

$action = $p[1];
$controller = '\App\Controller\\' . ucfirst($p[0]) . 'Controller';
$controller = new $controller();
$controller->$action();

?>


<!--ul#mainMenu>li.items*4>{test list $}-->
<!--p*4>lorem-->