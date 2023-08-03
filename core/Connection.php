<?php

class Connection{
    private static $instance = null, $conn =null;

    private function __construct($config)
    {
        define('_DB',$config['db']);
        define('_HOST',$config['host']);
        define('_USER',$config['user']);
        if(!empty($config['pass'])){
            define('_PASS',$config['pass']);
        }else{
            define('_PASS','');
        }
        
        //Kết nối database
            try{
                //Cấu hình dsn
                    $dsn = 'mysql:dbname='._DB.';host='._HOST;
                //Cấu hình $options
                /* 
                *   -Cấu hình UTF-8
                *   -Cấu hình xử lí ngoại lệ khi truy vấn lỗi
                */
                    $options = [
                        PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
                        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
                    ];
                //Xử lí kết nối
                    $con = new PDO($dsn,_USER,_PASS,$options);
                    self::$conn = $con;
            }catch(Exception $exception){
                $mess = $exception->getMessage();
                if(preg_match('/Access denied for user/',$mess)){
                    die('Người dùng không có quyền truy cập');
                }

                if(preg_match('/Unknown database/',$mess)){
                    die('Không tìm thấy cơ sở dữ liệu');
                }
                die($mess);
            }
            

    }
    public static function getInstance($config){
        if(self::$instance==null){
            $connection = new Connection($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}