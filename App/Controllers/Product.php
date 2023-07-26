<?php
    class Product extends BaseController{
        public $model;
        public $data = [];
        public function __construct(){
            $this->model = $this->getModel('ProductModel');
        }
        public function index(){
            $this->data['content'] = 'Product/index';
            $this->data['sub_content']=[];
            $this->data['title']='Index';
            $this->renderView('layouts/client_layout',$this->data);
        }

        public function list(){
            echo 'This is list product page.';
        }
        public function detail($id='',$id1=''){
            echo 'This is product detail page.'.$id.$id1;
        }
    }
?>