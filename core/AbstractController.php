<?php


use App\Http\Request\Request;

class AbstractController {

	var $vars = array();
	var $layout = "layout";
	var $header = "header";
	var $footer = "footer";
	public $controller;
	/**
	 * @var Session
	 */
	protected $Session;

	function __construct() {
	    $this->Session = new Session();
    }

	function render($filename, $data = []) {
		$this->controller = $filename;
		//on fait passer nos données à la vue
		extract($this->vars);

		//je démarre la mise en mémoire tampon
		ob_start();

		$filename .= '.blade.php';
		//on require la view + header + layout et footer
		if (file_exists(ROOT.$filename)) {
			Template::view(ROOT.$filename, $data);
		} else {
			echo 'Error 404';
		}
		$content_for_layout = ob_get_clean();
        $content_for_header = ob_get_clean();
        $content_for_footer = ob_get_clean();
        require(ROOT.'views/'.$this->header.'.php');
		require(ROOT.'views/'.$this->layout.'.php');
		require(ROOT.'views/'.$this->footer.'.php');

	}


	function set ($d) {
		//on fusionne nos données venant du modèle (la classe fille
		//avec les données de la classe mère ($vars))
		$this->vars = array_merge($this->vars, $d);
	}
	function getVars(){
		return $this->vars;
	}
	function loadModel ($name){
		//chargement du model
		require (ROOT."models/".$name.".php");
		// on créer une propriété contenant l'objet instancié model
		$this->$name = new $name;
	}
	protected function createView($filename, $data = '')
	{
		//on truncate en enlevant Controller de la chaîne pour avoir que Home comme nom de dossier :)
		$controllerClass = str_replace('Controller', '',  get_class($this));

		//on crée la vue
		$view = new View($controllerClass, $filename);
		if (!empty($data)) {
			$this->set($data);

		}
		//on rend la vue + données (j'ai fais comme ça car je peux include header, layout et footer)
		$this->render($view->getFile(), $this->getVars());
	}
	/**
	 * Setter for request object
	 *
	 * @param $request
	 */
	public function setRequest($request)
	{
		$this->request = $request;
	}

	public function getPost(){
		return $_POST;
	}
	public function store() {
		$req = new Request();
		$params = explode("/", $_GET["p"]);
		$requestName = $params['0'].'Request';
		$requestName = $req->datacheck($requestName);


		var_dump($requestName);
		die();
	}

}
?>
