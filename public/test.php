<?php
define('ROOTPATH', dirname(__FILE__, 2));

$v = Validator::make([],[]);
$x = BookController::run();