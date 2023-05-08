<?php
require ROOTPATH .  DIRECTORY_SEPARATOR . 'controllers/PageController.php';
require ROOTPATH .  DIRECTORY_SEPARATOR . 'controllers/BookController.php';
require ROOTPATH .  DIRECTORY_SEPARATOR . '/DataStore.php';

Router::get('/', [PageController::class, 'home']);
Router::get('/contact', [PageController::class, 'contact']);
Router::get('/about', [PageController::class, 'about']);
Router::get('/books/create', [BookController::class, 'form']);
Router::post('/books/create', [BookController::class, 'submit']);