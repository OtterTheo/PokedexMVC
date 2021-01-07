<?php


class Route
{
    public static function routing($route,$data)
    {
        $link = explode('/', $route);


        $contr = $link[0].'Controller';

        $controller = new $contr();

        $action = $link[1] ;


        return WEBROOT.$route;
    }
}
