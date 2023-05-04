<?php
require '../helpers.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => '../controllers/home.php',
    '/about' => '../controllers/about.php',
    '/contact' => '../controllers/contact.php',
    '/books/create' => '../controllers/create-book.php',
];


routeTo($routes, $uri);