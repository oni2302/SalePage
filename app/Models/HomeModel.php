<?php
class HomeModel extends BaseModel
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
    public function getNewProduct(){
        $sql="call getNewProduct()";
        $result = $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
}
