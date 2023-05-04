<?php
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

$baseDir = '../store/';
function create($collection, $data){
    global $baseDir;
    $file = fopen("$baseDir$collection.txt", 'a');
    fwrite($file, $data . "\n");
    fclose($file);
}

function read($collection){
    global $baseDir;
    $data = [];
    $file = fopen("$baseDir$collection.txt", 'r');
    while(!feof($file)){
        $line = trim(fgets($file));
        $book = $line ? explode('|', $line) : null;
        if($book){
            $data[] = [
                'name' => $book[0],
                'author' => $book[1],
                'year' => $book[2]
            ];
        }
    }
    fclose($file);
    return $data;
}