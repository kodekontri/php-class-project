<?php
define('ROOTPATH', dirname(__FILE__, 2));
define('VIEWPATH', ROOTPATH . DIRECTORY_SEPARATOR . 'views');

require ROOTPATH . DIRECTORY_SEPARATOR . 'helpers.php';
require ROOTPATH . DIRECTORY_SEPARATOR . 'Router.php';
require ROOTPATH . DIRECTORY_SEPARATOR . 'routes.php';


Router::resolve();