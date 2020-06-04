<?php
namespace PHPMVC;

use PHPMVC\LIB\FrontController;

require_once '..'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config.php';

require_once APP_PATH.DS.'lib'.DS.'autoload.php';


$frontController =new FrontController();
$frontController->dispatch();
