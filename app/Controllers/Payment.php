<?php
    class Payment extends BaseController{
        public $model;
        private $data = [];
        public function __construct(){
            $this->model = $this->getModel('PaymentModel');
        }
        public function cart(){
            $this->data['content'] = 'Payment/cart';
            $this->data['sub_content']=[];
            $this->data['title']='Giỏ hàng';
            $this->renderView('layouts/client_layout',$this->data);
        }
        public function payment(){

        }
        public function info(){
            
        }
    }
?>