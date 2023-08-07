<?php
class FunctionModel extends BaseModel
{
    private $_product = 'product';
    function tableFill()
    {
    }
    function fieldFill()
    {
    }
    public function __construct()
    {
        parent::__construct();
    }
    public function otpInsert($email = '', $phone = '', $otp, $type)
    {
        if (($email == '' && $phone == '') || empty($otp) || empty($type)) {
            return false;
        }
        $exprireTime = date('Y-m-d H:i:s', strtotime(' +5 minutes '));
        $sql = "insert into otp values(NULL,'$email','$phone',$type,'$otp','$exprireTime')";
        $this->execute($sql);
    }
    public function otpValidation($otp, $email)
    {
        $now = date('Y-m-d H:i:s');
        $sql = "select * from otp where _otp = $otp and _email = '$email' and _isUsed !=1";
        $result = $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }
    public function checkEmailExist($email)
    {
        $sql = "select _email from account where _email = '$email'";
        $result = $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
        return !empty($result);
    }
    public function signUp($email, $password)
    {
        $sql = "insert into account values(null,'$email',null,'$password',1)";
        $this->execute($sql);
        return true;
    }

    public function getProductCartInfo($id,$size,$quantity){
        $sql ="call getProductCartInfo($id,$size,$quantity)";
        $result = $this->execute($sql)->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
}
