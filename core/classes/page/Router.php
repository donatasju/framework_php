<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core\Page;

/**
 * Description of Router
 *
 * @author ned
 */
class Router {
    
    public static $routes = [];

    public static function addRoute($uri, $controller_name) {
        self::$routes[$uri] = $controller_name;
    }

    public static function getRouteController($uri) {
        if (isset(self::$routes[$uri])) {
            $class = self::$routes[$uri];
            return new $class();
        }
    }

}
