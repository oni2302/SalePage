<?php
require_once _ROOT . '/vendor/autoload.php';

use Zalo\Zalo;
use Zalo\ZaloEndpoint;

class Auth extends BaseController
{
    public $model;
    public $data = [];
    public function __construct()
    {
        $this->model = $this->getModel('admin/AuthModel');
    }
    public function Login(){
        $this->data['content'] = 'admin/Auth/login';
        $this->data['sub_content']=[];
        $this->data['title'] = 'Đăng nhập quản trị viên';
        $this->renderView('layouts/account_layout', $this->data);
    }
    private function base64url_encode($plainText)
    {
        $base64 = base64_encode($plainText);
        $base64 = trim($base64, '=');    
        $base64url = strtr($base64, '+/', '-_');  
        return ($base64url);
    }
    public function ZaloLogin()
    {
        $config = array(
            'app_id' => '656644953594930604',
            'app_secret' => 'u6T56MATFAX0k7UNOj2A'
        );
        $zalo = new Zalo($config);
        $helper = $zalo->getRedirectLoginHelper();
        $callBackUrl = "https://oni2302.id.vn/Admin/Auth/AdminZalo";
        $random = bin2hex(openssl_random_pseudo_bytes(32));    
        $code_verifier = $this->base64url_encode(pack('H*', $random));    
        $code_challenge = $this->base64url_encode(pack('H*', hash('sha256', $code_verifier)));
        // $codeChallenge = base64_encode(hash('sha256',$this->loginUrlCodeVerify));
        // $codeChallenge = 'pmWkWSBCL51Bfkhn79xPuKBKHz__H6B-mY6G9_eieuM';
        $state = "1";
        $loginUrl = $helper->getLoginUrl($callBackUrl, $codeChallenge, $state);
        header('location: ' . $loginUrl);
    }
    public function AdminZalo()
    {
        try {
            $config = array(
                'app_id' => '656644953594930604',
                'app_secret' => 'u6T56MATFAX0k7UNOj2A'
            );
            $zalo = new Zalo($config);
            $helper = $zalo->getRedirectLoginHelper();
            $zaloToken = $helper->getZaloToken("123");
            $accessToken = $zaloToken->getAccessToken();

            $params = ['fields' => 'id,name,picture'];
            $response = $zalo->get(ZaloEndpoint::API_GRAPH_ME, $accessToken, $params);
            
            $result = $response->getDecodedBody();
            $check = $this->model->checkZaloAccount($result['id'])['result'];
            if($check){
                $_SESSION['admin']['id']=$result['id'];
                $_SESSION['admin']['name'] = $result['name'];
                $_SESSION['admin']['avatar'] = $result['picture']['data']['url'];
                header('location: '._WEB.'/quan-li-san-pham');
            }else{
                echo("Tài khoản Zalo không thuộc hệ thống");
            }
        } catch (Exception $e) {
            echo 'Link đăng nhập hết hiệu lực';
        }
    }
}
