<?php
require '../vendor/autoload.php';

define('ROOTPATH', dirname(__FILE__, 2));
define('VIEWPATH', ROOTPATH . DIRECTORY_SEPARATOR . 'views');

App\Router::resolve();