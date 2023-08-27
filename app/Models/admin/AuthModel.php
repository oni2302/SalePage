<?php
class AuthModel extends BaseModel
{
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
    public function checkZaloAccount($id){
        $sql = "select check_zalo_account($id) as result";
        return $this->execute($sql)->fetch(PDO::FETCH_ASSOC);
    }
}