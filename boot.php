<?php
define('_ROOT', str_replace('\\', '/', __DIR__));
//Xử lí đường dẫn web
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web = 'https://';
} else {
    $web = 'http://';
}
$web .= $_SERVER['HTTP_HOST'];
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_ROOT));
$web .= $folder;
define('_WEB', $web);
//
/*
*Tự động load config
*/
$configs_dir = scandir('configs');
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}
require_once 'core/Route.php';
require_once './app/App.php';
//Kiểm tra config load database
    if(!empty($configs['database'])){
        $db_config = array_filter($configs['database']);    
        if(!empty($db_config)){
            require_once 'core/Connection.php';
            require_once 'core/QueryBuilder.php';
            require_once 'core/Database.php';
        }   
    }
require_once 'core/BaseModel.php';
require_once 'core/Request.php';
require_once 'core/BaseController.php';
require_once 'app/App.php';
