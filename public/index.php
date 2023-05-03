<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function urlIs($url){
    return $_SERVER['REQUEST_URI'] === $url;
}

function routeTo($routes, $uri){
    if(!array_key_exists($uri, $routes)){
        echo "Not Found";
        http_response_code(404);
        exit();
    }
    
    require $routes[$uri];
}

$routes = [
    '/' => '../controllers/home.php',
    '/about' => '../controllers/about.php',
    '/contact' => '../controllers/contact.php',
    '/books/create' => '../controllers/create-book.php',
];


routeTo($routes, $uri);