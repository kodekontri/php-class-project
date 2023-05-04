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
    $filename = "$baseDir$collection.json";

    $dataFromFile = json_decode(file_get_contents($filename)) ?? [];
    $data['id'] = count($dataFromFile) + 1;
    $dataFromFile[] = $data;
    file_put_contents($filename, json_encode($dataFromFile));
}

function read($collection){
    global $baseDir;
    $data = json_decode(file_get_contents("$baseDir$collection.json"), true);
    return $data;
}