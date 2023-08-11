<?php
    class AccountModel extends BaseModel{
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
        public function checkLogin($email,$password){
            $sql = "select * from account where _email='$email' and _password = '$password'";
            $result = $this->execute($sql)->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function getCart($userId){
            $sql = "select c._quantity as quantity,p.*,s._id as size_id,s._value
            from cart c
            join product p on c._productId = p._id
            join size s on c._sizeId = s._id 
            where _userId = $userId";
            $result =$this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function addCart($user,$product,$size,$quantity){
            $sql = "call addCart($user,$product,$size,$quantity)";
            $this->execute($sql);
        }
    }