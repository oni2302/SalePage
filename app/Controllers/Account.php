<?php
class Account extends BaseController
{
    public $model;
    private $data = [];
    public function __construct()
    {
        $this->model = $this->getModel('AccountModel');
    }

    public function loginValidate()
    {
        $request = new Request();
        extract($request->getField());
        $user = $this->model->checkLogin($email, $password);
        if (!empty($user)) {
            $_SESSION['user'] = $user;
            $cart = $this->model->getCart($user['_id']);
            if (empty($cart)) {
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION as $key => $value) {
                        try {
                            $this->model->addCart($user['_id'], $value['_id'], $value['size_id'], $value['quantity']);
                        } catch (Exception $e) {
                            echo 'a';
                        }
                    }
                }
            } else {
                $_SESSION['cart'] = $cart;
            }
            header('location:'._WEB);
        }else{
            header('loaction:'._WEB.'/dang-nhap');
        }
    }
    public function login(){
        $this->data['content'] = 'Account/login';
        $this->data['sub_content']=[];
        if(isset($_SESSION['message'])){
            $this->data['sub_content']['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        $this->data['title']='Đăng nhập';
        $this->renderView('layouts/client_layout',$this->data);
    }
    public function logout(){
        session_destroy();
        header('location:'._WEB.'/dang-nhap');
    }
}
