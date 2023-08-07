<?php
class FunctionHandle extends BaseController
{
    public $model;
    public $data = [];
    public function __construct(){
        $this->model = $this->getModel('FunctionModel');
    }
    public function generateOtpForSignUp($email){
        $otp = rand(100000, 999999);
        $mail = new Mailer();
        $mail->SendOTP($otp, "Đăng kí", $email);

        $this->model->otpInsert($email, '', $otp, 1);
    }
    public function signUp(){
        $request = new Request();
        extract($request->getField());
        $emailExist = $this->model->checkEmailExist($email);
        if (!$emailExist) {
            $otp = $this->model->otpValidation($otp, $email);

            if ($otp == true) {
                if ($password == $rePassword) {
                    $this->model->signUp($email,$password);
                    echo true;
                    return;
                } else {
                    echo 'Mật khẩu không khớp';
                    return;
                }
            } else {
                echo 'Sai OTP';
                return;
            }
        } else {
            echo 'Email đã tồn tại';
        }
    }

    public function addCart(){
        $request = new Request();
        extract($request->getField());
        
        if(isset($_SESSION['cart']))
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['_id']==$id){
                $_SESSION['cart'][$key]['quantity']+=$quantity;
                return;
            }
        }
        $result = $this->model->getProductCartInfo($id,$size,$quantity);
        $result['quantity']=$quantity;
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=[];
        }
        if($result!=false){
            array_push($_SESSION['cart'],$result);
        }
    }
}
