<?php
use system\Database;
use system\SessionModel;
// Load config files
$config = [];
foreach (scandir(ROOT_DIR . "configs") as $cf) {
    if(!in_array($cf, [".", ".."])){
        include_once ROOT_DIR . "configs/" . $cf;
    }
}

function config_item($config_name)
{
    global $config;
    return $config[$config_name];
}

// load model database
require_once "Database.php";
$db = new Database();

require_once "SessionModel.php";
$session = new SessionModel();

$mod = $_GET['mod'] ?? "home";
$page = $_GET['page'] ?? "index";

$className = strtoupper($mod[0]) . substr($mod, 1);
$controller_path = CONTROLLERS_DIR . $className . '.php';

// autoload
foreach (scandir(ROOT_DIR . "helpers") as $helper) {
    if(!in_array($helper, [".", ".."])){
        include_once ROOT_DIR . "helpers/" . $helper;
    }
}

// load model database
require_once "Base.php";
require_once "BaseModel.php";
require_once "BaseController.php";

if( file_exists($controller_path) ){
    include_once $controller_path;
    if( class_exists($className) ){
        $controller = new $className();
        if( method_exists($controller, $page) ){
            $controller->$page();
        }else{
            show_error();
        }
    }else{
        show_error();
    }
}else{
    show_error();
}
