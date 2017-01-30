<!-- Index du site -->
<?php
define('ROOT', dirname(__DIR__));
require_once(ROOT . '/app/Appli.php');
// Permet de charger l'autoloader depuis Appli
Appli::load();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}
//
ob_start();
if($p === 'home') {
    require ROOT . '/pages/articles/home.php';
} elseif($p === 'article.show') {
    require ROOT . '/pages/articles/article.php';
} elseif ($p === 'article.categorie') {
    require ROOT . '/pages/articles/categorie.php';
} elseif ($p === 'login') {
    require ROOT . '/pages/users/login.php';
} elseif ($p === '404') {
    require ROOT . '/pages/page404.php';
}
//
//// Permet de stocker les require dans la variable $content
$content = ob_get_clean();
require ROOT . '/pages/templates/template.php';

?>


<!--ul#mainMenu>li.items*4>{test list $}-->
<!--p*4>lorem-->