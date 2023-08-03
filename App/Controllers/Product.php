<?php
    class Product extends BaseController{
        public $model;
        public $data = [];
        public function __construct(){
            $this->model = $this->getModel('ProductModel');
        }
        public function index(){
            
        }
        public function list(){
            echo 'This is list product page.';
        }
        public function detail($id='',$id1=''){
            echo 'This is product detail page.'.$id.$id1;
        }
    }
?>