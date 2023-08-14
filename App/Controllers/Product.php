<?php
    class Product extends BaseController{
        public $model;
        public $data = [];
        public function __construct(){
            $this->model = $this->getModel('ProductModel');
        }
        public function detail($param=''){
            if(empty($param)){
                App::$app->showError();
                return;
            }
            $this->data['content'] = 'Product/detail';
            $this->data['sub_content']=[];
            $this->data['sub_content']['_info'] =  $this->model->_getProductDetail($param);
            $this->data['title']='Chi tiết sản phẩm';
            $this->renderView('layouts/client_layout',$this->data);
        }
        
        public function size($id){
            echo json_encode($this->model->_getSize($id));
            
        }
        public function list(){
            $this->data['content'] = 'Product/list';
            $this->data['sub_content']=[];
            $this->data['sub_content']['_list'] =  $this->model->_getProductList();

            $this->data['title']='Chi tiết sản phẩm';
            $this->renderView('layouts/client_layout',$this->data);
        }
        public function search(){
            $request = new Request();
            $keyword = $request->getField()['keyword'];
            $this->data['content'] = 'Product/list';
            $this->data['sub_content']=[];
            $this->data['sub_content']['_list'] =  $this->model->_getProductList($keyword);

            $this->data['title']='Tìm kiếm';
            $this->renderView('layouts/client_layout',$this->data);
        }
    }
?>