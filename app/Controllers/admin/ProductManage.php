<?php

    class ProductManage extends AdminController{
        public $model;
        public $data = [];
        public function __construct()
        {
            $this->model = $this->getModel('admin/ProductManageModel');
            parent::__construct();
        }
        public function index(){
            $this->data['content'] = 'admin/Product/index';
            $this->data['sub_content']['productList']=$this->model->getProductList();
            $this->data['title']='Trang chủ';
            $this->renderView('layouts/admin_layout_normal',$this->data);
        }
        public function edit($id=''){
            if(empty($id)){
                header("location:"._WEB."/admin/ProductManage/index");
            }
            $this->data['content'] = 'admin/Product/edit';
            $this->data['sub_content']=[];
            $this->data['title']='Sửa sản phẩm';
            $this->renderView('layouts/admin_layout_normal',$this->data);
        }
    }