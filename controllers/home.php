<?php
$books = read('books');


function filterBy($books, $func){
    $items = [];
    
    foreach($books as $book){
        if($func($book)){
            array_push($items, $book);
        }
    }

    return $items;
}

$books = filterBy($books, function($book){
    $filter = trim($_GET['filter']) ?? null; // author
    $query = trim($_GET['query'] )?? null; // Kelvin Chi

    if(!$filter) return true;

    return $book[$filter] === $query;
});


$title = "Home Page";
require '../views/index.view.php';