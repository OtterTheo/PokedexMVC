<?php
//error_reporting(E_ALL);
//ini_set('display_errors',1);
//portfolio.index.blade.php : dispatcher / routeur : pour aiguiller
define ('WEBROOT', str_replace('index.php', '', $_SERVER['REQUEST_URI']));

define ('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
//echo "WEBROOT: ".WEBROOT.'<br>';
//echo "ROOT: ".ROOT.'<br>';
require(ROOT.'config/conf.php');
require(ROOT.'core/AbstractController.php');
require(ROOT.'core/AbstractModel.php');
require(ROOT.'core/View.php');
require(ROOT.'core/Template.php');
require(ROOT.'core/Session.php');
$chemin= explode("/",WEBROOT);
/*echo "<PRE>";
print_r ($chemin);
echo "</PRE>";*/

define ('WEBROOT2', $chemin[1]);
//echo "get p: ".$_GET["p"]."<br>";
if (!empty($_GET['p'])) {
    $params = explode("/", $_GET["p"]);
} else {
    $params=array();
}
/*echo "<PRE>";
print_r ($params);
echo "</PRE>";*/
if (isset($params[0])) {
    $controller = $params[0];
}

if (!isset($controller)) {
   $controller = "Home";


}
if (isset($params[1])) {
	$action=$params[1];
}
if (!isset($action)) {

	$action="index";
}
$controller .=  "Controller";
if (file_exists('controllers/'.$controller.'.php')) {
    require ('controllers/'.$controller.'.php');
//instanciation de mon controller
    $controller = new $controller();



//vérification de l'existance de l'action demandée
    if (method_exists($controller,$action)) {


        unset($params[0]);
        unset($params[1]);


        // Appel de la méthode $foo->bar() avec 2 arguments
        call_user_func_array(array($controller, $action), $params);
    } else {
        echo "Erreur 404";
    }
} else {
    echo "Erreur 404";
}

?>
