<?php
    class Request{
        //Kiểm tra phương thức yêu cầu
        function getMethod(){
            return strtolower($_SERVER['REQUEST_METHOD']);
        }
        function isPost(){
            return $this->getMethod()=='post';
        }
        function isGet(){
            return $this->getMethod()=='get';
        }
        //Lấy dữ liệu từ phương thức yêu cầu
        function getField(){
            $dataField=[];
            if($this->isGet()){
                if(!empty($_GET)){
                    foreach ($_GET as $key => $value) {
                        if(is_array($value)){
                            $dataField[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                        }
                        else{
                            $dataField[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
                        }
                    }
                    $_GET = null;
                }
            }
            
            if($this->isPost()){
                if(!empty($_POST)){
                    foreach($_POST as $key=>$value){
                        if(is_array($value)){
                            $dataField[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                        }
                        else{
                            $dataField[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
                        }
                    }
                    $_POST = null;
                }
            }

            return $dataField;
        }
    }
?>