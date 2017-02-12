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

// Auth
$app = Appli::getInstance();
$auth = new DBAuth($app->getDB());

if (!$auth->logged()) {
    $app->forbidden();
}
//
ob_start();
if($p === 'home') {
    require ROOT . '/pages/admin/articles/index.php';
} elseif ($p === 'article.edit') {
    require ROOT . '/pages/admin/articles/edit.php';
} elseif($p === 'article.add') {
    require ROOT . '/pages/admin/articles/add.php';
} elseif($p === 'article.delete') {
    require ROOT . '/pages/admin/articles/delete.php';
} elseif ($p === 'article.login') {
    require ROOT . '/pages/admin/articles/login.php';
} elseif($p === 'categories.index') {
    require ROOT . '/pages/admin/categories/index.php';
} elseif ($p === 'categories.edit') {
    require ROOT . '/pages/admin/categories/edit.php';
} elseif($p === 'categories.add') {
    require ROOT . '/pages/admin/categories/add.php';
} elseif($p === 'categories.delete') {
    require ROOT . '/pages/admin/categories/delete.php';
} elseif ($p === 'categories.login') {
    require ROOT . '/pages/admin/categories/login.php';
} elseif ($p === '404') {
    require ROOT . '/pages/page404.php';
}

//// Permet de stocker les require dans la variable $content
$content = ob_get_clean();
require ROOT . '/pages/templates/template.php';

?>