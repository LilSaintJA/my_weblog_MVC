<!-- Index du site -->
<?php
use Core\Auth\DBAuth;

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
    require ROOT . '/pages/admin/articles/index.php';
} elseif ($p === 'article.edit') {
    require ROOT . '/pages/admin/articles/edit.php';
} elseif ($p === 'article.login') {
    require ROOT . '/pages/admin/articles/login.php';
} elseif ($p === '404') {
    require ROOT . '/pages/page404.php';
}
// Auth
$app = Appli::getInstance();
$auth = new DBAuth($app->getDB());

if (!$auth->logged()) {
    $app->forbidden();
}

//// Permet de stocker les require dans la variable $content
$content = ob_get_clean();
require ROOT . '/pages/templates/template.php';

?>