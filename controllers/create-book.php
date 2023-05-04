<?php
$method = $_SERVER['REQUEST_METHOD'];

if($method === 'POST'){
    $name = $_POST['name'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $data = "$name|$author|$year";

    create('books', $data);
    header('location: /books/create');
}

$title = "Create Book";
require '../views/books/create.view.php';