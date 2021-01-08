<?php


class Router
{
    /**
     * @var array
     */
    private $request;

    /**
     * Récupère les paramètres en GET et POST puis génère le controller associé
     *
     * @param $params
     * @return array
     * @throws Exception
     */
    public function createRequest($params) {

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

            $action = "index";
        }
        // On récupère les données en GET et en POST
        $this->request = array_merge($_GET, $_POST);

        // On crée le controller nécessaire
        $controller = $this->createController($controller);

        return $routing = [
                'controller' => $controller,
                'action' => $action
            ];
    }

    /**
     * Charge le fichier et la classe du controller
     *
     * @throws Exception
     */
    private function createController($controller) {


        $controller = ucfirst($controller);
        $controllerClass = $controller. 'Controller';
        $controllerFile = 'controllers/' . $controllerClass . '.php';

        if (file_exists($controllerFile)) {
            // Instanciation du contrôleur adapté à la requête
            require($controllerFile);

            $ControllerInstancie = new $controllerClass();

            $ControllerInstancie->setRequest($this->request);

            return $ControllerInstancie;
        }
        else {
            throw new Exception('Fichier ' . $controllerFile . ' introuvable');
        }
    }
}
