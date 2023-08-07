<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
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
require_once _ROOT.'/core/Route.php';
require_once _ROOT.'/app/App.php';
//Kiểm tra config load database
    if(!empty($configs['database'])){
        $db_config = array_filter($configs['database']);    
        if(!empty($db_config)){
            require_once _ROOT.'/core/Connection.php';
            require_once _ROOT.'/core/QueryBuilder.php';
            require_once _ROOT.'/core/Database.php';
        }   
    }
require_once _ROOT.'/core/BaseModel.php';
require_once _ROOT.'/core/Request.php';
require_once _ROOT.'/core/Mailer.php';
require_once _ROOT.'/core/BaseController.php';
require_once _ROOT.'/app/App.php';
