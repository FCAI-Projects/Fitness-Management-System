<?php
define('DS',DIRECTORY_SEPARATOR);
define('APP_PATH',realpath(dirname(__FILE__)));


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'fitness');

define('VIEWS_PATH',APP_PATH.DS.'views'.DS );
define("URLROOT", 'http://localhost/fitness/public');
// Site Name
define("SITENAME", 'Fitness Club');
session_start();
