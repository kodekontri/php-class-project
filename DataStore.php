<?php

class DataStore
{
    private $baseDir = '../store/';
    private $collection;

    function __construct(string $collection){
        $this->collection =  $collection;
    }
    function save($data){
        $filename = "$this->baseDir$this->collection.json";

        $dataFromFile = json_decode(file_get_contents($filename)) ?? [];
        $data['id'] = count($dataFromFile) + 1;
        $dataFromFile[] = $data;
        file_put_contents($filename, json_encode($dataFromFile));
    }

    function read(){
        $data = json_decode(file_get_contents("$this->baseDir$this->collection.json"), true);
        return $data;
    }
}