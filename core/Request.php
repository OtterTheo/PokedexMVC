<?php

namespace App\Http\Request;

use ReflectionClass;

class Request
{

    public function __construct()
    {

    }

    public function getGet() {
        return $_GET;
    }
    public function getPost() {

        return $_POST;
    }
    //recupère les regles associés aux champs désiré
    public function getRules($requestName)
    {
       $requestClass = self::factory($requestName);
       $rules = $requestClass->rules();
       var_dump($rules);
       die();
    }
    public function datacheck($requestname)
    {
        //appel de GetRules pour récupérer les règles
        $rules = $this->getRules($requestname);

        var_dump($rules);
        die();
    }
    public static function factory($name)
    {
        $class = 'App\Http\Request\\' . $name;
        return new $class();
    }

}
