<?php 
    define('_ROOT',str_replace('\\','/',__DIR__));
    //Xử lí đường dẫn web
        if(!empty($_SERVER['HTTPS']) &&$_SERVER['HTTPS']=='on'){
            $web = 'https://';
        }else{
            $web = 'http://';
        }
        $web.=$_SERVER['HTTP_HOST'];
        $folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'',strtolower(_ROOT));
        $web.=$folder;
        define('_WEB',$web);
    //
    require_once 'Core/Route.php';
    require_once 'Configs/routes.php';
    require_once 'Core/BaseController.php';
    
    require_once 'App/App.php';
?>