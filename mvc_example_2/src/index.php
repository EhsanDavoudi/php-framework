<?php
ini_set('display_errors', 1);
define('ROOT_DIR', __DIR__ . DIRECTORY_SEPARATOR);

define('APPLICATION_DIR', ROOT_DIR . 'application' . DIRECTORY_SEPARATOR);
define('SYSTEM_DIR', ROOT_DIR . 'system' . DIRECTORY_SEPARATOR);
define('CONTROLLERS_DIR', ROOT_DIR . 'controllers' . DIRECTORY_SEPARATOR);
define('MODEL_DIR', ROOT_DIR . 'models' . DIRECTORY_SEPARATOR);
define('VIEW_DIR', ROOT_DIR . 'views' . DIRECTORY_SEPARATOR);

session_start();

//include 'test.php';
include 'system/core.php';