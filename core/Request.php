<?php

namespace App\Http\Request;

use AbstractController;
use Router;

class Request extends AbstractController
{

    public function __construct()
    {

    }
    //récupére les données en GET
    public function getGet() {
        return $_GET;
    }
    //récupére les données en POST
    public function getPost() {

        return $_POST;
    }
    //recupère les regles associés aux champs désirés
    public function getRules($requestName)
    {
       $requestClass = self::factory($requestName);
       return  $requestClass->rules();

    }
    public function datacheck($requestname)
    {
        //appel de GetRules pour récupérer les règles
        $rules = $this->getRules($requestname);
        foreach ($this->getPost() as $key => $value) {

            if (array_key_exists($key, $rules)) {
                $valuesRules = explode('|',$rules[$key]);

                for($i=0;$i<count($valuesRules);$i++) {
                    switch ($valuesRules[$i]) {
                        case('string') :
                           $responses[$key]['string'] = [] ;
                            if (gettype($value) == 'string') {
                                array_push($responses[$key]['string'], true);
                            } else {
                                $messages[$key]['string'] = [] ;
                                array_push( $messages[$key]['string'], 'Le type de '.$key.' est invalide, veulllez saisir le bon type (string)');
                            }
                        break;
                        case('required') :
                            $responses[$key]['required'] = [];
                            if (!empty($value)) {
                                array_push($responses[$key]['required'], true);
                            } else {
                                $messages['mess'][$key]['required'] = [] ;
                                array_push($messages['mess'][$key]['required'], 'Le champ '.$key.' est requis');
                            }
                        break;
                    }
                }
            }
        }

        if (!empty($messages)) {
            $route = new Router;
              $routing = $route->createRequest([0 => 'Pokedex', 1 => 'create']);
              call_user_func_array([
                  $routing['controller'],
                  $routing['action']],
                  $messages);
              die;
        } else {
            return $this->getPost();
        }

    }
    public static function factory($name)
    {
        $class = 'App\Http\Request\\' . $name;
        return new $class();
    }

}
