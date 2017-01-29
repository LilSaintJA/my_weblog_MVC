<!-- Index du site -->
<?php
define('ROOT', dirname(__DIR__));
require_once(ROOT . '/app/Appli.php');
// Permet de charger l'autoloader depuis Appli
Appli::load();

$appli = Appli::getInstance();

// *** nouvel index.php en utilisant le fichier Config.php

$posts = $appli->getTable('Articles');
//$posts = $appli->getTable('Categories');

var_dump($posts->all());














//if(isset($_GET['p'])) {
//    $p = $_GET['p'];
//} else {
//    $p = 'home';
//}
//
//ob_start();
//if($p === 'home') {
//    require '../pages/home.php';
//} elseif($p === 'article') {
//    require '../pages/article.php';
//} elseif ($p === 'categorie') {
//    require '../pages/categorie.php';
//} elseif ($p === 'login') {
//    require '../pages/login.php';
//} elseif ($p === '404') {
//    require '../pages/page404.php';
//}
//
//// Permet de stocker les require dans la variable $content
//$content = ob_get_clean();
//require '../pages/templates/template.php';

?>


<!--ul#mainMenu>li.items*4>{test list $}-->
<!--p*4>lorem-->