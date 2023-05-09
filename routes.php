<?php
use App\Router;
use App\Controllers;
// require ROOTPATH .  DIRECTORY_SEPARATOR . 'controllers/PageController.php';
// require ROOTPATH .  DIRECTORY_SEPARATOR . 'controllers/BookController.php';
// require ROOTPATH .  DIRECTORY_SEPARATOR . '/DataStore.php';

Router::get('/', [Controllers\PageController::class, 'home']);
Router::get('/contact', [Controllers\PageController::class, 'contact']);
Router::get('/about', [Controllers\PageController::class, 'about']);
Router::get('/books/create', [Controllers\BookController::class, 'form']);
Router::post('/books/create', [Controllers\BookController::class, 'submit']);