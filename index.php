<?php
$books = [
    [
        'name' => 'How to make money in 2023',
        'author' => "Andris John",
        "year" => 2019
    ],
    [
        'name' => '7 ways to be rich',
        'author' => "Kelvin Chi",
        "year" => 2018
    ],
    [
        'name' => 'Learn to code in Python',
        'author' => "Kelvin Chi",
        "year" => 2014
    ],
    [
        'name' => 'Good old days',
        'author' => "Sammy",
        "year" => 2010
    ]
];


function filterBy($books, $func){
    $items = [];
    
    foreach($books as $book){
        if($func($book)){
            array_push($items, $book);
        }
    }

    return $items;
}


$booksByYear = filterBy($books, function($book){
    return $book['year'] > 2014;
});

$booksByAuthor = filterBy($books, function($book){
    return $book['author'] === 'Kelvin Chi';
});

require './views/index.view.php';