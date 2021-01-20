<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//portfolio.index.blade.php : dispatcher / routeur : pour aiguiller
define ('WEBROOT', str_replace('index.php', '', $_SERVER['REQUEST_URI']));

define ('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
//echo "WEBROOT: ".WEBROOT.'<br>';
//echo "ROOT: ".ROOT.'<br>';
require_once(ROOT.'config/conf.php');
require_once(ROOT.'core/AbstractController.php');
require_once(ROOT.'core/AbstractModel.php');
require_once(ROOT.'core/View.php');
require_once(ROOT.'core/Template.php');
require_once(ROOT.'core/Session.php');
require_once(ROOT.'core/Router.php');
require_once(ROOT.'core/Request.php');
require_once(ROOT.'core/Helper.php');

$router = new Router();
$chemin= explode("/",WEBROOT);


define ('WEBROOT2', $chemin[1]);
//echo "get p: ".$_GET["p"]."<br>";
if (!empty($_GET['p'])) {
    $params = explode("/", $_GET["p"]);
} else {
    $params=array();
}
$routing = $router->createRequest($params);


if (file_exists('controllers/'.get_class($routing['controller']).'.php')) {

//vérification de l'existance de l'action demandée
    if (method_exists($routing['controller'],$routing['action'])) {

        unset($params[0]);
        unset($params[1]);

        // Appel de la méthode $foo->bar() avec 2 arguments
        call_user_func_array(array($routing['controller'], $routing['action']), $params);
    } else {
        echo "Erreur 404";
    }
} else {
    echo "Erreur 404";
}

?>
