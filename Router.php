<?php

class Router
{
    private static $routes = [
        'GET' => [],
        'POST' => []
    ];
    // Register Routes
    public static function register($method, $uri, $controller){
        self::$routes[strtoupper($method)][$uri] = $controller;
    }

    public static function get($uri, $controller){
        self::register('get', $uri, $controller);
    }

    public static function post($uri, $controller){
        self::register('post', $uri, $controller);
    }


    //  Respond
    public static function resolve(){
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        if(!array_key_exists($uri, self::$routes[$method])){
            echo "Not Found";
            http_response_code(404);
            exit();
        }
        
        $controller =  self::$routes[$method][$uri];

        return call_user_func(self::resolveController($controller));
    }

    public static function resolveController($controller){
            if(is_array($controller)){
                $class = new $controller[0];
                $method =  $controller[1];
                $controller = [$class, $method];
            }

            return $controller;
    }

    public static function urlIs($url){
        return $_SERVER['REQUEST_URI'] === $url;
    }
}